<?php

namespace App\DataTransferObjects\Candidates\Matching;

use Spatie\LaravelData\Attributes\DataCollectionOf;
use Spatie\LaravelData\DataCollection;
use Spatie\LaravelData\Optional;

class AddMultipleResumesToIndexRequestModelDTO extends Data
{
    public function __construct(
        #[DataCollectionOf(IndexResumeRequest::class)]
        public DataCollection|Optional $resumes,
    ) {
    }
}