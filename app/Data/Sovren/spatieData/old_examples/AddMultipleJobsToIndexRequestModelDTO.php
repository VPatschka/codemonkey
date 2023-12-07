<?php

namespace App\DataTransferObjects\Candidates\Matching;

use Spatie\LaravelData\Attributes\DataCollectionOf;
use Spatie\LaravelData\DataCollection;
use Spatie\LaravelData\Optional;
use Spatie\LaravelData\Data;

class AddMultipleJobsToIndexRequestModelDTO extends Data
{
    public function __construct(
        #[DataCollectionOf(IndexJobRequest::class)]
        public DataCollection|Optional $jobs,
    ) {
    }
}