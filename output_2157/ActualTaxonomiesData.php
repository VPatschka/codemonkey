```php
<?php

final class ActualTaxonomiesData
{
    public ?TaxonomyData $primary;
    public ?TaxonomyData $secondary;

    public function toArray(): array
    {
        return [
            'primary' => $this->primary,
            'secondary' => $this->secondary,
        ];
    }
}
```