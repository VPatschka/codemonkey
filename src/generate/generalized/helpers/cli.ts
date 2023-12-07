import { ChatModels } from './chat'

export type CLIParameters = {
  outputPath: string,
  selectedFile: string,
  // multipleFiles: boolean,
  model?: ChatModels,
  continue: boolean,
}

export function getCLIParameters(): CLIParameters {
  const outputArg = process.argv.find((arg) => arg.startsWith('output'))
  const outputPath = outputArg?.split('=')[1] ?? 'output'

  // const inputArg = process.argv.find((arg) => arg.startsWith('input'))
  // const input = inputArg?.split('=')[1] ?? 'sovren_v10.json'
  const selectedFile = process.argv.reverse()[0]

  return {
    outputPath,
    selectedFile,
    // model: 'gpt-4-1106-preview',
    // model: 'gpt-3.5-turbo-1106',
    continue: false,
  } satisfies CLIParameters
}