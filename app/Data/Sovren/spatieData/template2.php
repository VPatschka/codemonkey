namespace App\DataTransferObjects\Candidates\Matching;

use Spatie\LaravelData\Data;
use Spatie\LaravelData\Attributes\DataCollectionOf;
use Spatie\LaravelData\DataCollection;

class GridDetailSectionDTO extends Data
{
    /**
     * @param string $title
     * @param DataCollection<GridItemDTO> $items
     * @param array<string> $stringFields
     * @param DetailSectionType $sectionType
     */
    public function __construct(
        public string $title,
        #[DataCollectionOf(GridItemDTO::class)]
        public DataCollection $items,
        public array $stringFields, // for string[] use array!!!
        public DetailSectionType $sectionType = DetailSectionType::Grid,
    ) {
        parent::__construct($title, $sectionType);
    }
}
