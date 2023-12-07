<?php

namespace App\DataTransferObjects\Candidates\Matching;

use Spatie\LaravelData\Data;

class CategoryWeightsDTO extends Data
{
    public function __construct(
        public float $education,
        public float $jobTitles,
        public float $skills,
        public float $industries,
        public float $languages,
        public float $certifications,
        public float $executiveType,
        public float $managementLevel,
        public bool $educationHasData,
        public bool $jobTitlesHasData,
        public bool $skillsHasData,
        public bool $industriesHasData,
        public bool $languagesHasData,
        public bool $certificationsHasData,
        public bool $executiveTypeHasData,
        public bool $managementLevelHasData,
    ) {
    }
}