<?php

namespace App\DataTransferObjects\Candidates\Matching;

use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

class CategoryWeightDTO extends Data
{
    public function __construct(
        public string|Optional $category,
        public float $weight,
    ) {
    }
}