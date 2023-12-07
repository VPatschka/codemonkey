<?php

namespace App\DataTransferObjects\Candidates\Matching;

use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

class AddJobToIndexRequestModelDTO extends Data
{
    public function __construct(
        public JobData $jobData,
        public array|Optional $userDefinedTags,
    ) {
    }
}