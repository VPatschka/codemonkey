<?php

namespace App\DataTransferObjects\Candidates\Matching;

use App\Libraries\Sovren\DataTransferObjects\Matching\Fragments\BaseScoreDataItem;
use App\Libraries\Sovren\DataTransferObjects\Matching\Fragments\JobTitleFound;
use App\Libraries\Sovren\DataTransferObjects\Matching\Fragments\JobTitlesScoreDataItem;
use App\Libraries\Sovren\DataTransferObjects\Matching\Fragments\ScoreDataItem;
use App\Libraries\Sovren\DataTransferObjects\Matching\Fragments\SkillFound;
use App\Libraries\Sovren\DataTransferObjects\Matching\Fragments\SkillsScoreDataItem;
use Illuminate\Support\Str;
use Spatie\LaravelData\Attributes\DataCollectionOf;
use Spatie\LaravelData\DataCollection;

class ListDetailSectionDTO extends DetailSectionDTO
{
    /**
     * @param string $title
     * @param DataCollection<ListItemDTO> $items
     * @param DetailSectionType $sectionType
     */
    public function __construct(
        public string $title,
        #[DataCollectionOf(ListItemDTO::class)]
        public DataCollection $items,
        public DetailSectionType $sectionType = DetailSectionType::List,
    ) {
        parent::__construct($title, $sectionType);
    }
}