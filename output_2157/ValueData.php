```php
<?php

final class ValueData
{
    /** @var MatchData[]|null */
    public ?array $matches;

    public ?int $currentCount;

    /** @var SuggestedCategoryWeightData[]|null */
    public ?array $suggestedCategoryWeights;

    /** @var AppliedCategoryWeightData[]|null */
    public ?array $appliedCategoryWeights;

    public ?int $elapsedMilliseconds;

    public ?int $totalCount;

    public ?int $creditsRemaining;

    public function toArray(): array
    {
        return [
            'matches' => $this->matches,
            'currentCount' => $this->currentCount,
            'suggestedCategoryWeights' => $this->suggestedCategoryWeights,
            'appliedCategoryWeights' => $this->appliedCategoryWeights,
            'elapsedMilliseconds' => $this->elapsedMilliseconds,
            'totalCount' => $this->totalCount,
            'creditsRemaining' => $this->creditsRemaining,
        ];
    }

    protected function castArray(string $fieldName): ?string
    {
        return match($fieldName) {
            'matches' => MatchData::class,
            'suggestedCategoryWeights' => SuggestedCategoryWeightData::class,
            'appliedCategoryWeights' => AppliedCategoryWeightData::class,
            default => null,
        };
    }
}
```