<?php

namespace App\DataTransferObjects\Candidates\Matching;

use Spatie\LaravelData\Data;

class DetailSectionDTO extends Data
{
    public function __construct(
        public string $title,
        public DetailSectionType $sectionType,
    ) {
    }
}