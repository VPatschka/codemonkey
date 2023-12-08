import fs from 'fs'

export const sourceFile = 'sovren_v10.json'

export const task = 'Create PHP files from Sovren swagger schemas'

export const template = 'Use included code at the end as a template.\n' +
  'This template is one class in one file - you\'ll also generate just one class in one response.\n' +
  '\n' +
  'Assume that all files are in same directory. Don\'t include use statements for property types.' +
  'All fields should start with lowercase letter.\n' +
  'Don\' include ``` and ```php marks!\n' +
  'Use type array for simple types like "string", "int", etc. otherwise use DataCollection.\n' +
  'Don\' use default values for properties, not even null. When property is nullable add "Optional" class to property type union.\n' +
  'Define all properties in constructor.\n' +
  'If the source template is of enum type, do not use template, but create PHP enum datatype with data from \'enum\' field.\n' +
  'Use valid PHP types, string[] is not valid type.'

export const schemaTemplate = 'Create PHP class with name "{schemaName}DTO" and definition:\n\n {schemaDefinition}'

export const output = (schemaName: string) => `${schemaName}DTO.php`

export const outputType = 'multiple'
export const type = 'swagger'

export const protectedFiles = ['template.php']
export const model = 'ft:gpt-3.5-turbo-1106:personal::8TTfio2b'

// filter

export const filterSchemas = (schemas: any): any => {
  const fileContents = fs.readFileSync(sourceFile, 'utf8');
  const sourceData = JSON.parse(fileContents);

  const allSchemas = sourceData?.components?.schemas ?? []
  const filteredNames = ['StructuredMatchRequestBase']
  // const filteredNames = getIncludedSchema(allSchemas, 'StructuredMatchRequestBase')

  return Object.keys(schemas).filter(name => filteredNames.includes(name))
    .reduce((acc, name) => ({ ...acc, [name]: schemas[name] }), {})
}

function getIncludedSchema(allSchemas: any, schemaName: string): string[] {
  const output = [schemaName]
  const definition = allSchemas[schemaName]
  if (definition?.properties) {
    for (const propertyKey of Object.keys(definition.properties)) {
      const property = definition.properties[propertyKey]
      if (property?.$ref) {
        const ref = property.$ref.replace('#/components/schemas/', '')
        output.push(...getIncludedSchema(allSchemas, ref))
      }
      if (property?.items?.$ref) {
        const ref = property.items.$ref.replace('#/components/schemas/', '')
        output.push(...getIncludedSchema(allSchemas, ref))
      }
    }
  }
  return output
}