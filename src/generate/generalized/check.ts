import { findCodeMonkeyFilesAsync } from './helpers/finder'
import { getToolConfig } from './helpers/config'

async function main() {
  const toolConfig = await getToolConfig()
  const files = await findCodeMonkeyFilesAsync(toolConfig.rootDir, 'codemonkey.ts')

  console.log('Found files:')
  files.forEach((file) => {
    console.log(file)
  })
}

main().then(() => console.log('')).catch(console.error)