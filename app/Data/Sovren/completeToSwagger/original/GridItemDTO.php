<?php

namespace App\DataTransferObjects\Candidates\Matching;

use App\Libraries\Sovren\DataTransferObjects\Matching\Fragments\Taxonomy;
use Spatie\LaravelData\Data;

class GridItemDTO extends Data
{
    public function __construct(
        public string $title,
        public bool $isInResume,
        public bool $isInJob,
    ) {
    }

    public static function fromTaxonomy(Taxonomy $taxonomy, bool $isResumeOrigin): self
    {
        return new self(
            $taxonomy->name,
            $taxonomy->matched || $isResumeOrigin,
            $taxonomy->matched || !$isResumeOrigin,
        );
    }
}