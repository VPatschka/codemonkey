```php
<?php

namespace App\Libraries\Sovren\DataTransferObjects\Parser\Fragments\Response\ResumeDataFragments;

use App\Libraries\Sovren\DataTransferObjects\BaseDataTransferObject;

final class EducationData extends BaseDataTransferObject
{
    public ?string $expectedEducation;

    public ?string $actualEducation;

    public ?string $comparison;

    public ?float $unweightedScore;

    /** @var EvidenceData[]|null */
    public ?array $evidence;

    public function toArray(): array
    {
        return [
            'expectedEducation' => $this->expectedEducation,
            'actualEducation' => $this->actualEducation,
            'comparison' => $this->comparison,
            'unweightedScore' => $this->unweightedScore,
            'evidence' => $this->evidence,
        ];
    }

    protected function castArray(string $fieldName): ?string
    {
        return match($fieldName) {
            'evidence' => EvidenceData::class,
            default => null,
        };
    }
}
```