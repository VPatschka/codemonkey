<?php

namespace App\DataTransferObjects\Candidates\Matching;

use Spatie\LaravelData\Data;

class AutoCompleteProfessionsResponseStructuredResponseModelDTO extends Data
{
    public function __construct(
        public StructuredResponseInfoModel $info,
        public AutoCompleteProfessionsResponse $value,
    ) {
    }
}