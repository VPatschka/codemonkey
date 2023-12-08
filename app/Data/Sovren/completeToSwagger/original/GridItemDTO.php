<?php

namespace App\DataTransferObjects\Candidates\Matching;

use App\Libraries\Sovren\DataTransferObjects\Matching\Fragments\Taxonomy;
use Spatie\LaravelData\Data;

class GridItemDTO extends Data
{
    /**
     * @param string $title
     * @param bool $isInResume
     * @param bool $isInJob
     */
    public function __construct(
        public string $title,
        public bool $isInResume,
        public bool $isInJob,
    ) {
    }
}