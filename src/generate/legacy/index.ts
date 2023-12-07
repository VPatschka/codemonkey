import { BaseMessage, HumanMessage, LLMResult, SystemMessage } from 'langchain/schema'
import { ChatOpenAI } from 'langchain/chat_models/openai'
import { TextLoader } from 'langchain/document_loaders/fs/text'
import { PromptTemplate } from 'langchain/prompts'
import fs from 'fs';
import * as util from 'util'

require('dotenv').config()

const getText = async (name: string) => (await (new TextLoader(`${__dirname}/${name}`)).load())[0].pageContent

type TokenUsage = {
  completionTokens: number,
  promptTokens: number,
  totalTokens: number,
}

type ModelName = 'gpt-3.5-turbo' | 'gpt-4'

const GptTurboCompletionPrice = 0.0015;
const GptTurboPromptPrice = 0.002;
const Gpt4CompletionPrice = 0.03;
const Gpt4PromptPrice = 0.06;
const OutputDirectory = 'output';

const currentModelName: ModelName = 'gpt-4' as ModelName;
const currentPromptPrice = currentModelName === 'gpt-3.5-turbo' ? GptTurboPromptPrice : Gpt4PromptPrice;
const currentCompletionPrice = currentModelName === 'gpt-3.5-turbo' ? GptTurboCompletionPrice : Gpt4CompletionPrice;

let finalScriptPrice = 0;
const USDToCZK = 23.03;

const chatModel = new ChatOpenAI({
  openAIApiKey: process.env.OPENAI_API_KEY,
  temperature: 0,
  modelName: 'gpt-4',
  streaming: false,
  callbacks: [
    {
      handleLLMEnd: async (output: LLMResult) => {
        const tokenUsage = output?.llmOutput?.tokenUsage as TokenUsage
        if (tokenUsage) {
          const { completionTokens, promptTokens } = tokenUsage;
          const promptPrice = promptTokens * currentPromptPrice / 1000;
          const completionPrice = completionTokens * currentCompletionPrice / 1000;
          const totalPrice = promptPrice + completionPrice;
          finalScriptPrice += totalPrice;
        }
      },
    },
  ],
})


async function getClassNameList(baseMessages: BaseMessage[]): Promise<string[]|undefined> {
  console.log('Start getting list of class name')

  const preprocessingChatModel = chatModel.bind({
    functions: [{
      name: 'outputClassList',
      description: 'List of all class names that are required to be created.',
      parameters: {
        name: 'output',
        type: 'object',
        properties: {
          names: {
            type: "array",
            items: {
              type: "string",
            }
          },
        }
      }
    }],
    function_call: { name: 'outputClassList' }
  })

  console.log('Call getting list of class names from ChatGPT')
  const result = await preprocessingChatModel.invoke([
    ...baseMessages,
    new HumanMessage('' +
      'Call function "outputClassList" with argument "output" that will list all class names that need to be generated from source.' +
      'Go from least nested to the most nested.'
    )
  ])

  const responseArguments = JSON.parse(result.additional_kwargs.function_call?.arguments ?? '{}') as { names?: string[] }
  console.log(responseArguments?.names)

  return responseArguments.names
}

async function main() {
  // const sovrenStructureUrl = 'https://rest.resumeparsing.com/v10/swagger.json';
  // const sovrenStructure = await (await fetch(sovrenStructureUrl)).text();
  // fs.writeFileSync(`sovren_v10.json`, sovrenStructure)
  // fs.writeFileSync(`test/test.json`, 'test');
  // return;

  console.log('Start')

  const task = 'Hello, I need you to generate DTOs in Laravel that will match API data structure from JSON, I will provide.'
  const [system, source, template] = await Promise.all([getText('system'), getText('source'), getText('template')])
  console.log('Prompt files loaded')

  const baseMessages = [
    new SystemMessage({ content: system }),
    new HumanMessage({ content: task }),
    new HumanMessage({ content: source }),
    new HumanMessage({ content: template }),
  ]

  // const classNameList = await getClassNameList(baseMessages)
  // if (!classNameList) {
  //   console.error('ChatGPT didn\'t return list of classNames to generate')
  //   return
  // }
  const classNameList = ['JobTitlesData']

  const generateFilePrompt = PromptTemplate.fromTemplate('Generate file {fileName}')
  for (const className of (classNameList ?? [])) {
    // gpt-3.5-turbo fix
    const realClassName = className.endsWith('Data') ? className : className + 'Data'

    console.log(`Calling ChatGPT: Generate file '${realClassName}'`)
    const result = await chatModel.predictMessages([
      ...baseMessages,
      new HumanMessage({ content: await generateFilePrompt.format({ fileName: realClassName }) })
    ])

    console.log(`Saving file ${realClassName}`)
    const { content } = result;

    fs.writeFileSync(`${OutputDirectory}/${realClassName}.php`, content)
    console.log(`File ${realClassName} saved!`)
    console.log(`Current price per script: ${finalScriptPrice.toFixed(4)}$, ${(finalScriptPrice * USDToCZK).toFixed(2)} CZK`)
  }
}

main().then(() => console.log('finished'))