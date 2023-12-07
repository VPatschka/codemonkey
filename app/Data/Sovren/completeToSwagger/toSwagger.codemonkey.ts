import fs from 'fs'
import path from 'path'

function getSourceFiles(): string[] {
  const files = fs.readdirSync(path.join(__dirname, 'original'))
  return files.map(file => path.join(__dirname, 'original', file));
}

export const sourceFiles = getSourceFiles()

export const task = 'Create swagger JSON for schema from PHP files'

export const template = 'Use included JSON at the end as a template.\n' +
  'Assume that all other classes are already converted to swagger. Don\'t convert any other models than the main one, ' +
  'include it as $ref.' +
  'All fields should start with uppercase letter.\n' +
  'When field is nullable, keep field "type" simple and add field "nullable" with value true.\n' +
  'Do not include ```json and ``` marks.\n' +
  'Remove "DTO" from end of components name.\n' +
  'Template:\n' +
  `"AddJobToIndexRequestModel": {
        "type": "object",
        "properties": {
          "JobData": {
            "$ref": "#/components/schemas/JobData"
          },
          "UserDefinedTags": {
            "type": "array",
            "items": {
              "type": "string"
            },
            "nullable": true
          }
        },
        "additionalProperties": false
      },`

export const filePromptTemplate = 'Create Swagger JSON with name "{sourceFile}" and from PHP file:\n\n {sourceFileContents}'

export const output = (schemaName: string) => schemaName.replace('original', 'new').replace(/(DTO)?\.php/, '.json')

export const type = 'refactoring'
export const model = 'gpt-4-1106-preview'