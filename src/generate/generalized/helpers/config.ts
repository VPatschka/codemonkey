import fs from 'fs'

export const defaultToolConfigPath = 'codemonkey.json'

export type ConfigFileOptions = {
  rootDir: string,
}

export function getToolConfig(): ConfigFileOptions {
  const configFile = process.env.CODEMONKEY_CONFIG_FILE ?? defaultToolConfigPath
  if (!configFile) {
    throw new Error('CodeMonkey config file not found. Please create a codemonkey.json file in the root of your project.')
  }

  return JSON.parse(fs.readFileSync(configFile, 'utf-8')) as ConfigFileOptions
}