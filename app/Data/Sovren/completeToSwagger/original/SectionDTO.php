<?php

namespace App\DataTransferObjects\Candidates\Matching;

use App\Libraries\Sovren\DataTransferObjects\Matching\Fragments\BaseScoreDataItem;
use App\Libraries\Sovren\DataTransferObjects\Matching\Fragments\Evidence;
use App\Libraries\Sovren\DataTransferObjects\Matching\Fragments\EvidenceType;
use App\Libraries\Sovren\DataTransferObjects\Matching\Fragments\ScoreDataItem;
use Illuminate\Support\Str;
use Spatie\LaravelData\Attributes\DataCollectionOf;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\DataCollection;

class SectionDTO extends Data
{
    /**
     * @param SectionType $type
     * @param string $title
     * @param float $score
     * @param string $summary
     * @param DataCollection<DetailSectionDTO> $detailSections
     */
    public function __construct(
        public SectionType $type,
        public string $title,
        public float $score,
        public string $summary,
        #[DataCollectionOf(DetailSectionDTO::class)]
        public DataCollection $detailSections,
    ) {
    }
}