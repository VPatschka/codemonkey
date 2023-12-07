import * as fs from 'fs'
import * as path from 'path'

export const moduleFileExtension = '.codemonkey.ts'

async function processFilesInFolderAsync(currentPath: string, extension: string): Promise<string[]> {
  const files = await fs.promises.readdir(currentPath)
  const output = []

  for (const file of files) {
    const filePath = path.join(currentPath, file)
    const stats = await fs.promises.stat(filePath)

    if (stats.isDirectory()) {
      output.push(...await processFilesInFolderAsync(filePath, extension))
    }

    if (stats.isFile() && file.endsWith(extension)) {
      output.push(filePath)
    }
  }

  return output;
}

export async function findCodeMonkeyFilesAsync(folderPath: string, extension?: string): Promise<string[]> {
  return await processFilesInFolderAsync(folderPath, extension ?? moduleFileExtension);
}

export async function getModuleFile(folderPath: string, name: string): Promise<string|undefined> {
  const files = await findCodeMonkeyFilesAsync(folderPath)
  return files.find((file) => file.endsWith(name + moduleFileExtension))
}
