<?php

namespace App\DataTransferObjects\Candidates\Matching;

use Spatie\LaravelData\Attributes\DataCollectionOf;
use Spatie\LaravelData\DataCollection;

class GridDetailSectionDTO extends DetailSectionDTO
{
    public function __construct(
        public string $title,
        #[DataCollectionOf(GridItemDTO::class)]
        public DataCollection $items,
        public DetailSectionType $sectionType = DetailSectionType::Grid,
    ) {
        parent::__construct($title, $sectionType);
    }
}
