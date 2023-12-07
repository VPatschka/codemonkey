<?php

namespace App\DataTransferObjects\Candidates\Matching;

use Spatie\LaravelData\Data;

class AutoCompleteSkillsResponseStructuredResponseModelDTO extends Data
{
    public function __construct(
        public StructuredResponseInfoModel $info,
        public AutoCompleteSkillsResponse $value,
    ) {
    }
}