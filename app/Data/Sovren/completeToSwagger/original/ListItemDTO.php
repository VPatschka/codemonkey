<?php

namespace App\DataTransferObjects\Candidates\Matching;

use Spatie\LaravelData\Data;

class ListItemDTO extends Data
{
    public function __construct(
        public string $title,
        public bool $isPositive,
    ) {
    }
}