<?php

namespace App\DataTransferObjects\Candidates\Matching;

use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

class AutoCompleteProfessionDTO extends Data
{
    public function __construct(
        public string|Optional $description,
        public int $codeId,
    ) {
    }
}