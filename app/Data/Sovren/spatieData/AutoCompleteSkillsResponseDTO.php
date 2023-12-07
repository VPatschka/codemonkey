<?php

namespace App\DataTransferObjects\Candidates\Matching;

use Spatie\LaravelData\Attributes\DataCollectionOf;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\DataCollection;
use Spatie\LaravelData\Optional;

class AutoCompleteSkillsResponseDTO extends Data
{
    public function __construct(
        #[DataCollectionOf(AutoCompleteSkill::class)]
        public DataCollection|Optional $skills,
    ) {
    }
}