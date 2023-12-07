```php
<?php

final class SecondaryData extends BaseDataTransferObject
{
    public ?TaxonomyData $taxonomy;
    public ?SubtaxonomyData $subtaxonomy;

    public function toArray(): array
    {
        return [
            'taxonomy' => $this->taxonomy,
            'subtaxonomy' => $this->subtaxonomy,
        ];
    }

    protected function castArray(string $fieldName): ?string
    {
        return null;
    }
}
```