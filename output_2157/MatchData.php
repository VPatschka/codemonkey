```php
<?php

final class MatchData
{
    public string $id;
    public float $weightedScore;

    /** @var UnweightedCategoryScoreData[] */
    public array $unweightedCategoryScores;

    public EnrichedScoreData $enrichedScoreData;
    public EnrichedRCSScoreData $enrichedRCSScoreData;
    public float $reverseCompatibilityScore;
    public string $indexId;
    public float $sovScore;

    public function toArray(): array
    {
        return [
            'id' => $this->id,
            'weightedScore' => $this->weightedScore,
            'unweightedCategoryScores' => $this->unweightedCategoryScores,
            'enrichedScoreData' => $this->enrichedScoreData,
            'enrichedRCSScoreData' => $this->enrichedRCSScoreData,
            'reverseCompatibilityScore' => $this->reverseCompatibilityScore,
            'indexId' => $this->indexId,
            'sovScore' => $this->sovScore,
        ];
    }

    protected function castArray(string $fieldName): ?string
    {
        return $fieldName === 'unweightedCategoryScores' ? UnweightedCategoryScoreData::class : null;
    }
}
```