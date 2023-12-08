<?php

namespace App\DataTransferObjects\Candidates\Matching;

use Spatie\LaravelData\Data;

class DetailSectionDTO extends Data
{
    /**
     * @param string $title
     * @param DetailSectionType $sectionType
     */
    public function __construct(
        public string $title,
        public DetailSectionType $sectionType,
    ) {
    }
}