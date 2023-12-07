```php
<?php

final class UnweightedCategoryScoreData
{
    public string $category;
    public float $unweightedScore;

    /** @var string[] */
    public array $termsFound;

    public function toArray(): array
    {
        return [
            'category' => $this->category,
            'unweightedScore' => $this->unweightedScore,
            'termsFound' => $this->termsFound,
        ];
    }

    protected function castArray(string $fieldName): ?string
    {
        return match($fieldName) {
            'termsFound' => 'string',
            default => null,
        };
    }
}
```