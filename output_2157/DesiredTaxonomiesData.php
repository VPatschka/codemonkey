```php
<?php

final class DesiredTaxonomiesData
{
    public ?PrimaryData $primary;

    public ?SecondaryData $secondary;

    public function toArray(): array
    {
        return [
            'primary' => $this->primary,
            'secondary' => $this->secondary,
        ];
    }
}
```