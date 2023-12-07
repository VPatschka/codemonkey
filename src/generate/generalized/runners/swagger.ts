import { SwaggerModuleConfiguration } from '../index'
import fs from 'fs'
import { createChat, createMessageList, getPromptFromFile } from '../helpers/chat'
import { PromptTemplate } from 'langchain/prompts'
import { HumanMessage, AIMessage } from 'langchain/schema'
import { CLIParameters } from '../helpers/cli'
import path from 'path'

export async function run(module: SwaggerModuleConfiguration, configuration: CLIParameters) {
  console.log('Running swagger generator')

  const outputPath = `${module.configDirectory}/${module.output}`
  if (module.outputType === 'single' && fs.existsSync(outputPath)) {
    console.log('Output file already exists, deleting')
    fs.unlinkSync(outputPath)
  }

  console.log('Getting contents of swagger file')
  const fileContents = fs.readFileSync(module.sourceFile, 'utf8');
  const sourceData = JSON.parse(fileContents);

  const allSchemas = sourceData?.components?.schemas ?? {}
  const schemas = module.filterSchemas?.(allSchemas) ?? allSchemas

  console.log('Creating chat model')
  const chatModel = createChat(configuration.model ?? module.model)

  const baseMessages = [
    ...createMessageList(
      await getPromptFromFile('system'),
      [module.task, module.template]
    ),
  ]

  const generateFilePrompt = PromptTemplate.fromTemplate(module.schemaTemplate)
  // for (const schemaName in { 'EvidenceType': ''  }) {
  for (const schemaName in schemas) {
    const definition = schemas[schemaName]
    console.log(`Calling ChatGPT: Generate file '${schemaName}'`)
    // console.log({ schema: schemaName, desc: schemas[schemaName] })

    const result = await chatModel.predictMessages([
      ...baseMessages,
      new HumanMessage({ content: await generateFilePrompt.format({
          schemaName: schemaName,
          schemaDefinition: JSON.stringify(definition),
      }) })
    ])

    const { content } = result as { content: string }

    if (module.outputType === 'single') {
      fs.appendFileSync(`${module.configDirectory}/${module.output(schemaName)}`, content + '\n\n')
    } else if (module.outputType === 'multiple') {
      fs.writeFileSync(`${module.configDirectory}/${module.output(schemaName)}`, content)
    }
  }
}
