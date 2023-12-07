```php
<?php

namespace App\Libraries\Sovren\DataTransferObjects\Parser\Fragments\Response\ResumeDataFragments;

use App\Libraries\Sovren\DataTransferObjects\BaseDataTransferObject;

final class AutoCompleteProfessionsResponse extends BaseDataTransferObject
{
    /** @var AutoCompleteProfession[]|null */
    public ?array $professions;

    public function toArray(): array
    {
        return [
            'professions' => $this->professions,
        ];
    }

    protected function castArray(string $fieldName): ?string
    {
        return match($fieldName) {
            'professions' => AutoCompleteProfession::class,
            default => null,
        };
    }
}
```