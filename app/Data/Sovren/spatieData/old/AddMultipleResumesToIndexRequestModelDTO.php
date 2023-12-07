<?php

namespace App\DataTransferObjects;

use Spatie\LaravelData\Data;
use Spatie\LaravelData\Attributes\DataCollectionOf;
use Spatie\LaravelData\DataCollection;

class AddMultipleResumesToIndexRequestModelDTO extends Data
{
    #[DataCollectionOf(IndexResumeRequest::class)]
    public ?DataCollection $resumes;

    public function __construct(?DataCollection $resumes)
    {
        $this->resumes = $resumes;
    }
}