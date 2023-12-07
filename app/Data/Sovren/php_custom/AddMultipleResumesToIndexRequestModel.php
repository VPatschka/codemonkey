```php
<?php

namespace App\Libraries\Sovren\DataTransferObjects\Parser\Fragments\Response\ResumeDataFragments;

use App\Libraries\Sovren\DataTransferObjects\BaseDataTransferObject;

final class AddMultipleResumesToIndexRequestModel extends BaseDataTransferObject
{
    /** @var IndexResumeRequest[]|null */
    public ?array $resumes;

    public function toArray(): array
    {
        return [
            'resumes' => $this->resumes,
        ];
    }

    protected function castArray(string $fieldName): ?string
    {
        return match($fieldName) {
            'resumes' => IndexResumeRequest::class,
            default => null,
        };
    }
}
```