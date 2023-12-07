<?php

namespace App\DataTransferObjects\Candidates\Matching;

use Spatie\LaravelData\Optional;
use Spatie\LaravelData\Data;

class SkillDTO extends Data
{
    public function __construct(
        public string|Optional $skillName,
        public IntegerRange $monthsOfExperienceRange,
        public bool $isCurrent,
        public ExperienceLevel $experienceLevel,
    ) {
    }
}