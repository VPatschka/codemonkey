<?php

namespace App\DataTransferObjects;

use Spatie\LaravelData\Data;
use Spatie\LaravelData\Attributes\DataCollectionOf;
use Spatie\LaravelData\DataCollection;

class AddMultipleJobsToIndexRequestModelDTO extends Data
{
    #[DataCollectionOf(IndexJobRequest::class)]
    public ?DataCollection $jobs;

    public function __construct(?DataCollection $jobs)
    {
        $this->jobs = $jobs;
    }
}