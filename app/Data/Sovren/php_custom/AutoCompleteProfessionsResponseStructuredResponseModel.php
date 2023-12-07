```php
<?php
namespace App\Libraries\Sovren\DataTransferObjects\Parser\Fragments\Response\ResumeDataFragments;

use App\Libraries\Sovren\DataTransferObjects\BaseDataTransferObject;

final class AutoCompleteProfessionsResponseStructuredResponseModel extends BaseDataTransferObject
{
    public ?StructuredResponseInfoModel $info;
    public ?AutoCompleteProfessionsResponse $value;

    public function toArray(): array
    {
        return [
            'info' => $this->info,
            'value' => $this->value,
        ];
    }
}
```