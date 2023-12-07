<?php

namespace App\DataTransferObjects\Candidates\Matching;

use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

class AssociationDTO extends Data
{
    public function __construct(
        public string|Optional $organization,
        public string|Optional $role,
        public string|Optional $foundInContext,
    ) {
    }
}