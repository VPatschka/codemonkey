```php
<?php

final class TaxonomiesData
{
    public ?ActualTaxonomiesData $actualTaxonomies;
    public ?DesiredTaxonomiesData $desiredTaxonomies;
    public ?float $unweightedScore;

    /** @var EvidenceData[]|null */
    public ?array $evidence;

    public function toArray(): array
    {
        return [
            'actualTaxonomies' => $this->actualTaxonomies,
            'desiredTaxonomies' => $this->desiredTaxonomies,
            'unweightedScore' => $this->unweightedScore,
            'evidence' => $this->evidence,
        ];
    }

    protected function castArray(string $fieldName): ?string
    {
        return $fieldName === 'evidence' ? EvidenceData::class : null;
    }
}
```