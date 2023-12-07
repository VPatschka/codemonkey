```php
<?php

final class JobTitlesData
{
    /** @var array|null */
    public ?array $found;

    /** @var string[]|null */
    public ?array $notFound;

    public float $unweightedScore;

    /** @var array|null */
    public ?array $evidence;

    public function toArray(): array
    {
        return [
            'found' => $this->found,
            'notFound' => $this->notFound,
            'unweightedScore' => $this->unweightedScore,
            'evidence' => $this->evidence,
        ];
    }

    protected function castArray(string $fieldName): ?string
    {
        return match($fieldName) {
            'found' => 'array',
            'notFound' => 'string',
            'evidence' => 'array',
            default => null,
        };
    }
}
```