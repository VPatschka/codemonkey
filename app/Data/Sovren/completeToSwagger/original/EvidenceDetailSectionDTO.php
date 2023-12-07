<?php

namespace App\DataTransferObjects\Candidates\Matching;

use Spatie\LaravelData\Optional;

class EvidenceDetailSectionDTO extends DetailSectionDTO
{
    public function __construct(
        public string $title,
        public EvidenceType $evidenceType,
        public string|Optional $description,
        public DetailSectionType $sectionType = DetailSectionType::Evidence,
    ) {
        parent::__construct($title, $sectionType);
    }
}