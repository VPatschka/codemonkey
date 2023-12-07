import fs from 'fs'

export const sourceFile = 'sovren_v10.json'

export const task = 'Create PHP files from Sovren swagger schemas'

export const template = 'Use included code at the end as a template.\n' +
  'This template is one class in one file - you\'ll also generate just one class in one response.\n' +
  '\n' +
  'Assume that all files are in same directory. Don\'t include use statements for property types.' +
  'When you use "array" type for some field always include comment with type as is within the template.\n' +
  'Method "toArray" should just return all fields as is. All fields in output array should start with lowercase.\n' +
  'Method "castArray" should return item type for each field with type "array", do not add any other fields.\n' +
  '  If you would just return null, don\'t include the function at all. Don\'t include fields that return simple types like "string", "int", "bool" etc.\n' +
  '\n' +
  'All fields should start with lowercase letter.\n' +
  'Always include the template namespace, use statements and extends with base class.\n' +
  'Don\' include ``` and ```php marks!\n' +
  'If the source template is of enum type, do not use template, but create PHP enum datatype with data from \'enum\' field.\n' +
  fs.readFileSync(__dirname + '/template.php')

export const schemaTemplate = 'Create PHP file with name "{schemaName}" and definition:\n\n {schemaDefinition}'

export const output = (schemaName: string) => `${schemaName}.php`

export const outputType = 'multiple'
export const type = 'swagger'

export const protectedFiles = ['template.php']
export const model = 'gpt-4-1106-preview'