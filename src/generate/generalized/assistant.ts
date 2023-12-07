import fs from 'fs'
import { OpenAIAssistantRunnable } from 'langchain/experimental/openai_assistant'

require('dotenv').config()

async function main() {
  const fileContents = fs.readFileSync('sovren_v10.json', 'utf8')
  const sourceData = JSON.parse(fileContents)
  const schemas = sourceData?.components?.schemas ?? []

  const agent = new OpenAIAssistantRunnable({
    assistantId: 'asst_PrI5VHsoZ4WqMUtpcs4Ij6Ym',
    asAgent: true,
  })

  const definition = {
      "type": "object",
      "properties": {
        "Jobs": {
          "type": "array",
          "items": {
            "$ref": "#/components/schemas/IndexJobRequest"
          },
          "nullable": true
        }
      },
      "additionalProperties": false
    }

  const result = await agent.invoke({
    'content': 'Generate file "AddMultipleJobsToIndexRequestModelDTO" with schema: \n' + JSON.stringify(definition)
  })
  console.log(result)
}

main().then(() => console.log('Finished')).catch(console.error)