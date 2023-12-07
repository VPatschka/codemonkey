<?php

namespace App\DataTransferObjects\Candidates\Matching;

use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

class JobTitleSlimDTO extends Data
{
    public function __construct(
        public string|Optional $title,
        public bool $isCurrent,
    ) {
    }
}