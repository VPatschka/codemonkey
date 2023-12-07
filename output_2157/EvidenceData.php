```php
<?php

namespace App\Libraries\Sovren\DataTransferObjects\Parser\Fragments\Response\ResumeDataFragments;

use App\Libraries\Sovren\DataTransferObjects\BaseDataTransferObject;

final class EvidenceData extends BaseDataTransferObject
{
    public string $fact;
    public string $type;

    public function toArray(): array
    {
        return [
            'fact' => $this->fact,
            'type' => $this->type,
        ];
    }
}
```