```php
<?php

namespace App\Libraries\Sovren\DataTransferObjects\Parser\Fragments\Response\ResumeDataFragments;

use App\Libraries\Sovren\DataTransferObjects\BaseDataTransferObject;

final class AddResumeToIndexRequestModel extends BaseDataTransferObject
{
    public ResumeData $resumeData;
    /** @var string[]|null */
    public ?array $userDefinedTags;

    public function toArray(): array
    {
        return [
            'resumeData' => $this->resumeData,
            'userDefinedTags' => $this->userDefinedTags,
        ];
    }
}
```