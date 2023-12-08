<?php

namespace App\DataTransferObjects\Candidates\Matching;

use Spatie\LaravelData\Attributes\DataCollectionOf;
use Spatie\LaravelData\DataCollection;

class GridDetailSectionDTO extends DetailSectionDTO
{
    /**
     * @param string $title
     * @param DataCollection<GridItemDTO> $items
     * @param DetailSectionType $sectionType
     */
    public function __construct(
        public string $title,
        #[DataCollectionOf(GridItemDTO::class)]
        public DataCollection $items,
        public DetailSectionType $sectionType = DetailSectionType::Grid,
    ) {
        parent::__construct($title, $sectionType);
    }
}
