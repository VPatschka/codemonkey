<?php

namespace App\DataTransferObjects\Candidates\Matching;

use Spatie\LaravelData\Optional;

class EvidenceDetailSectionDTO extends DetailSectionDTO
{
    /**
     * @param string $title
     * @param EvidenceType $evidenceType
     * @param string|Optional $description
     * @param DetailSectionType $sectionType
     */
    public function __construct(
        public string $title,
        public EvidenceType $evidenceType,
        public string|Optional $description,
        public DetailSectionType $sectionType = DetailSectionType::Evidence,
    ) {
        parent::__construct($title, $sectionType);
    }
}