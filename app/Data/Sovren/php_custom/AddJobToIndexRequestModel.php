```php
<?php

namespace App\Libraries\Sovren\DataTransferObjects\Parser\Fragments\Response\ResumeDataFragments;

use App\Libraries\Sovren\DataTransferObjects\BaseDataTransferObject;

final class AddJobToIndexRequestModel extends BaseDataTransferObject
{
    public ?JobData $jobData;
    
    /** @var string[]|null */
    public ?array $userDefinedTags;

    public function toArray(): array
    {
        return [
            'jobData' => $this->jobData,
            'userDefinedTags' => $this->userDefinedTags,
        ];
    }
}
```