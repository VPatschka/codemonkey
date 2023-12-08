import { RefactoringModuleConfiguration, SwaggerModuleConfiguration } from '../index'
import fs from 'fs'
import { createChat, createMessageList, getPromptFromFile } from '../helpers/chat'
import { PromptTemplate } from 'langchain/prompts'
import { HumanMessage } from 'langchain/schema'
import { CLIParameters } from '../helpers/cli'
import path from 'path'

/**
 * Takes list of already existing files and generates new ones based on prompts
 * Uses "output" function in module configuration to determine whole output file path
 *
 * @param module
 * @param configuration
 */
export async function run(module: RefactoringModuleConfiguration, configuration: CLIParameters) {
  console.log('Running refactoring generator')

  const sourceFiles = module.sourceFiles

  console.log(sourceFiles)

  console.log('Creating chat model')
  const chatModel = createChat(configuration.model ?? module.model)
  const baseMessages = createMessageList(
    await getPromptFromFile('system'),
    [module.task, module.template]
  );

  const generateFilePrompt = PromptTemplate.fromTemplate(module.filePromptTemplate)
  for (const sourceFile of sourceFiles) {
    console.log(`Calling ChatGPT: Generate file '${sourceFile}'`)
    // console.log(module.output(sourceFile))
    // return
    // const sourceFilePath = `${module.configDirectory}/${sourceFile}`

    const result = await chatModel.predictMessages([
      ...baseMessages,
      new HumanMessage({ content: await generateFilePrompt.format({
          sourceFile: path.basename(sourceFile),
          sourceFileContents: fs.readFileSync(sourceFile, 'utf8'),
      }) })
    ])

    //! can be different types of content
    const { content } = result as { content: string }

    // fs.writeFileSync(`${module.configDirectory}/${module.output(sourceFile)}`, content)
    fs.writeFileSync(module.output(sourceFile), content)
  }
}