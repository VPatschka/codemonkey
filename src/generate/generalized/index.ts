import { findCodeMonkeyFilesAsync, getModuleFile } from './helpers/finder'
import { getCLIParameters } from './helpers/cli'
import { getToolConfig } from './helpers/config'
import path from 'path'
import { ChatModels } from './helpers/chat'

require('dotenv').config()

export type ModuleConfiguration = SwaggerModuleConfiguration | RefactoringModuleConfiguration

export type BaseModuleConfiguration = {
  task: string, // added as first user prompt, eg: 'Create typescript types from Sovren swagger schemas'
  template: string, // added as second user prompt, used to describe the resulting file
  output: (schemaName: string) => string, // takes the schemaName and allows to change the output file name from it
  configDirectory: string, // generated automatically
  configFileName: string, // generated automatically
  model: ChatModels // model used for chat
}

export type SwaggerModuleConfiguration = BaseModuleConfiguration & {
  sourceFile: string, // swagger file, taken from root directory, can be changed
  schemaTemplate: string, // template for each schema, eg: 'Create Typescript interface with name "{schemaName}". The definition:\n{schemaDefinition}'
  outputType: 'single' | 'multiple', // single - all schemas in one file, multiple - each schema in separate file
  type: 'swagger',
  protectedFiles: string[], // files that should not be deleted when generating again, not used now
  filterSchemas?: (schemas: any) => any, // used to filter schemas, so you don't need to generate all of them
}

export type RefactoringModuleConfiguration = BaseModuleConfiguration & {
  sourceFiles: string[], // files that will be refactored, have to include absolute path
  filePromptTemplate: string, // template for each file, eg: 'Refactor file {sourceFile}: {sourceFileContents}'
  type: 'refactoring',
}

async function main() {
  const toolConfig = await getToolConfig()
  const cliParams = getCLIParameters()
  const moduleFileOrUndefined = await getModuleFile(toolConfig.rootDir, cliParams.selectedFile)
  if (moduleFileOrUndefined === undefined) {
    throw new Error('Module file not found. Include valid module.')
  }

  const moduleFile = moduleFileOrUndefined as string

  const module = await import(process.cwd() + '/' + moduleFile)
  const configDirectory = path.dirname(moduleFile)
  const configFileName = path.basename(moduleFile) + path.extname(moduleFile)

  if (['swagger', 'swagger_hacked', 'refactoring'].includes(module.type)) {
    const runner = await import(`${__dirname}/runners/${module.type}.ts`)
    await runner.run({
      ...module,
      configDirectory,
      configFileName,
    }, cliParams);
  }

}

main().then(() => console.log('Finished')).catch(console.error)