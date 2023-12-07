<?php

namespace App\DataTransferObjects\Candidates\Matching;

use Spatie\LaravelData\Data;
use Spatie\LaravelData\Attributes\DataCollectionOf;
use Spatie\LaravelData\DataCollection;
use Spatie\LaravelData\Optional;

class AutoCompleteProfessionsResponseDTO extends Data
{
    public function __construct(
        #[DataCollectionOf(AutoCompleteProfession::class)]
        public DataCollection|Optional $professions,
    ) {
    }
}