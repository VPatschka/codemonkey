<?php

namespace App\Libraries\Sovren\DataTransferObjects\Parser\Fragments\Response\ResumeDataFragments;

use App\Libraries\Sovren\DataTransferObjects\BaseDataTransferObject;

final class AutoCompleteProfession extends BaseDataTransferObject
{
    public ?string $description;
    public ?int $codeId;

    public function toArray(): array
    {
        return [
            'description' => $this->description,
            'codeId' => $this->codeId,
        ];
    }
}