```php
<?php

namespace App\Libraries\Sovren\DataTransferObjects\Parser\Fragments\Response\ResumeDataFragments;

use App\Libraries\Sovren\DataTransferObjects\BaseDataTransferObject;

final class FoundJobTitleData extends BaseDataTransferObject
{
    public ?string $rawTerm;

    public ?string $variationOf;

    public ?bool $isCurrent;

    public function toArray(): array
    {
        return [
            'rawTerm' => $this->rawTerm,
            'variationOf' => $this->variationOf,
            'isCurrent' => $this->isCurrent,
        ];
    }
}
```