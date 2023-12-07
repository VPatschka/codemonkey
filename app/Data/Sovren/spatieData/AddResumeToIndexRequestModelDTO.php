<?php

namespace App\DataTransferObjects\Candidates\Matching;

use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

class AddResumeToIndexRequestModelDTO extends Data
{
    public function __construct(
        public ResumeData $resumeData,
        public array|Optional $userDefinedTags,
    ) {
    }
}