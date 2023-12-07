<?php

namespace App\Libraries\Sovren\DataTransferObjects\Parser\Fragments\Response\ResumeDataFragments;

use App\Libraries\Sovren\DataTransferObjects\BaseDataTransferObject;

final class AutoCompleteSkill extends BaseDataTransferObject
{
    public ?string $description;
    public ?string $id;
    public ?string $type;

    public function toArray(): array
    {
        return [
            'description' => $this->description,
            'id' => $this->id,
            'type' => $this->type,
        ];
    }
}