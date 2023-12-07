import { ChatOpenAI } from 'langchain/chat_models/openai'
import { BaseMessage, HumanMessage, LLMResult, SystemMessage } from 'langchain/schema'
import { TextLoader } from 'langchain/document_loaders/fs/text'
import { CLIParameters } from './cli'

export type ChatModels = 'gpt-4-1106-preview' | 'gpt-3.5-turbo-1106'

export function createChat(model: ChatModels = 'gpt-3.5-turbo-1106') {
  console.log(model)
  return new ChatOpenAI({
    openAIApiKey: process.env.OPENAI_API_KEY,
    temperature: 0,
    modelName: model,
    streaming: false,
  })
}

export function createMessageList(system: string, human: string[]): BaseMessage[] {
  return [
    new SystemMessage({ content: system }),
    ...human.map((content) => new HumanMessage({ content })),
  ]
}

export const getPromptFromFile = async (name: string) => (await (new TextLoader(`${__dirname}/../prompts/${name}`)).load())[0].pageContent