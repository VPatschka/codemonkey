<?php

namespace App\DataTransferObjects\Candidates\Matching;

use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

class AutoCompleteSkillDTO extends Data
{
    public function __construct(
        public string|Optional $description,
        public string|Optional $id,
        public string|Optional $type,
    ) {
    }
}