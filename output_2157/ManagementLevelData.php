```php
<?php

final class ManagementLevelData
{
    public ?string $actual;
    public ?string $desired;
    public ?bool $amountOfExperienceMatches;
    public ?float $unweightedScore;

    /** @var EvidenceData[]|null */
    public ?array $evidence;

    public function toArray(): array
    {
        return [
            'actual' => $this->actual,
            'desired' => $this->desired,
            'amountOfExperienceMatches' => $this->amountOfExperienceMatches,
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