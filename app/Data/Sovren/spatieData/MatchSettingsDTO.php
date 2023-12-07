<?php

namespace App\DataTransferObjects\Candidates\Matching;

use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

class MatchSettingsDTO extends Data
{
    public function __construct(
        public bool $positionTitlesMustHaveAnExactMatch,
        public bool $positionTitlesIgnoreSingleWordVariations,
        public bool $normalizeJobTitles,
        public string|Optional $normalizeJobTitlesLanguage,
    ) {
    }
}