import fs from 'fs'

export const sourceFile = 'sovren_v10.json'

export const task = 'Create typescript types from Sovren swagger schemas'

export const template = 'Create typescript interface, class, type or enum for each schema in Sovren swagger schemas.\n' +
  'Schemas used inside current one are already created.\n' +
  'Create no comments.\n' +
  'Types start with uppercase, properties start with lowercase.\n' +
  'Convert enums to String Literal Types, eg: { "enum": ["first", "second"], "type": "string" } into export type SchemaName = "first" | "second"' +
  'If property is nullable, add "?", but no | null'

export const schemaTemplate = 'Create Typescript interface with name "{schemaName}". The definition:\n{schemaDefinition}'

export const output = (schemaName: string) => 'sovren.ts'

export const filterSchemas = (schemas: any): any => {
  const fileContents = fs.readFileSync(sourceFile, 'utf8');
  const sourceData = JSON.parse(fileContents);

  const allSchemas = sourceData?.components?.schemas ?? []
  const filteredNames = getIncludedSchema(allSchemas, 'StructuredMatchRequestBase')

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

export const outputType = 'single'
export const type = 'swagger'
export const model = 'gpt-3.5-turbo-1106'