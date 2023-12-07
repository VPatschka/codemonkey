import { findCodeMonkeyFilesAsync, getModuleFile } from './helpers/finder'
import { getCLIParameters } from './helpers/cli'
import { getToolConfig } from './helpers/config'
import path from 'path'
import { ChatModels } from './helpers/chat'

require('dotenv').config()

export type ModuleConfiguration = SwaggerModuleConfiguration | RefactoringModuleConfiguration

export type BaseModuleConfiguration = {
  task: string,
  template: string,
  output: (schemaName: string) => string,
  configDirectory: string,
  configFileName: string,
  model: ChatModels
}

export type SwaggerModuleConfiguration = BaseModuleConfiguration & {
  sourceFile: string,
  schemaTemplate: string,
  outputType: 'single' | 'multiple',
  type: 'swagger',
  protectedFiles: string[],
  filterSchemas?: (schemas: any) => any,
}

export type RefactoringModuleConfiguration = BaseModuleConfiguration & {
  sourceFiles: string[],
  filePromptTemplate: string,
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