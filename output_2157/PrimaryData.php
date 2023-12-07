```php
<?php

final class PrimaryData
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
}
```