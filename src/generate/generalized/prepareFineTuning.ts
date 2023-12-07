import { getPromptFromFile } from './helpers/chat'
import path from 'path'
import fs from 'fs'

type ChatRole = 'system' | 'user' | 'assistant'

type FineTuningMessage = {
  role: ChatRole,
  content: string,
}

type FineTuningRow = {
  messages: FineTuningMessage[],
}

const createMessage = (content: string, role: ChatRole = 'user'): FineTuningMessage => ({ content, role })

async function addTestMessages() {
  const originalPath = '/Users/vojtechpatschka/PhpstormProjects/langtest/app/Data/Sovren/completeToSwagger/original/'
  const newPath = '/Users/vojtechpatschka/PhpstormProjects/langtest/app/Data/Sovren/completeToSwagger/new/'
  const modulePath = '/Users/vojtechpatschka/PhpstormProjects/langtest/app/Data/Sovren/spatieData/spatieData.codemonkey.ts'

  const files = [
    'DetailSectionDTO.php',
    'DetailSectionType.php',
    'EvidenceDetailSectionDTO.php',
    'GridDetailSectionDTO.php',
    'GridItemDTO.php',
    'ListDetailSectionDTO.php',
    'ListItemDTO.php',
    'MatchingSummaryDTO.php',
    'SectionDTO.php',
    'SectionType.php',
  ]

  const system = await getPromptFromFile('system')
  const module = await import(modulePath)
  const { task, template } = module

  const rows: FineTuningRow[] = []
  for (const file of files) {
    const inputFileContent = fs.readFileSync(path.join(originalPath, file), 'utf8');

    const outputFileName = file.replace(/(DTO)?\.php/, '.json')
    const outputFileContent = fs.readFileSync(path.join(newPath, outputFileName), 'utf8');

    rows.push({
      messages:
        [
          createMessage(system, 'system'),
          createMessage(task),
          createMessage(template),
          createMessage(inputFileContent),
          createMessage(outputFileContent, 'assistant'),
        ],
    })
  }

  const outputData = rows.map(row => JSON.stringify(row)).join('\n')

  fs.writeFileSync('spatieData.fineTuning.jsonl', outputData)
}

addTestMessages().then(() => console.log('Finished!')).catch(console.error)