<?php

namespace App\DataTransferObjects\Candidates\Matching;

use App\Libraries\Sovren\DataTransferObjects\Matching\Fragments\EnrichedScoreData;
use App\Libraries\Sovren\DataTransferObjects\Matching\Fragments\MatchData;
use Spatie\LaravelData\Attributes\DataCollectionOf;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\DataCollection;

class MatchingSummaryDTO extends Data
{
    public function __construct(
        public int $score,
        #[DataCollectionOf(SectionDTO::class)]
        public DataCollection $sections,
        #[DataCollectionOf(SectionDTO::class)]
        public DataCollection $reverseSections
    ) {
    }
}