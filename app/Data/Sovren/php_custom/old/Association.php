<?php

namespace App\Libraries\Sovren\DataTransferObjects\Parser\Fragments\Response\ResumeDataFragments;

use App\Libraries\Sovren\DataTransferObjects\BaseDataTransferObject;

final class Association extends BaseDataTransferObject
{
    public ?string $organization;
    public ?string $role;
    public ?string $foundInContext;

    public function toArray(): array
    {
        return [
            'organization' => $this->organization,
            'role' => $this->role,
            'foundInContext' => $this->foundInContext,
        ];
    }
}