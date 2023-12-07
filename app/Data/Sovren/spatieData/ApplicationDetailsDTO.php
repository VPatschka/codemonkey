<?php

namespace App\DataTransferObjects\Candidates\Matching;

use Spatie\LaravelData\Optional;
use Spatie\LaravelData\Data;

class ApplicationDetailsDTO extends Data
{
    public function __construct(
        public string|Optional $applicationDescription,
        public string|Optional $contactPerson,
        public string|Optional $contactPhone,
        public string|Optional $contactEmail,
        public string|Optional $website,
        public \DateTimeInterface $applicationDeadline,
        public \DateTimeInterface $postedDate,
        public string|Optional $referenceNumber,
    ) {
    }
}