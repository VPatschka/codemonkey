```php
<?php

namespace App\Libraries\Sovren\DataTransferObjects\Parser\Fragments\Response\ResumeDataFragments;

use App\Libraries\Sovren\DataTransferObjects\BaseDataTransferObject;

final class TaxonomyData extends BaseDataTransferObject
{
    public ?string $name;
    public ?string $id;
    public ?bool $matched;

    public function toArray(): array
    {
        return [
            'name' => $this->name,
            'id' => $this->id,
            'matched' => $this->matched,
        ];
    }
}
```