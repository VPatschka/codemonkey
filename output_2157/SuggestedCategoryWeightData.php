```php
<?php

final class SuggestedCategoryWeightData
{
    public string $category;
    public int $weight;

    public function toArray(): array
    {
        return [
            'category' => $this->category,
            'weight' => $this->weight,
        ];
    }
}
```