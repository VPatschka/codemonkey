<?php

namespace App\DataTransferObjects\Candidates\Matching;

use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

class StringRangeDTO extends Data
{
    public function __construct(
        public string|Optional $minimum,
        public string|Optional $maximum,
    ) {
    }
}