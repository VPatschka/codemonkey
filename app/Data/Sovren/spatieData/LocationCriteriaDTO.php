<?php

namespace App\DataTransferObjects\Candidates\Matching;

use Spatie\LaravelData\Attributes\DataCollectionOf;
use Spatie\LaravelData\DataCollection;
use Spatie\LaravelData\Optional;

class LocationCriteriaDTO extends Data
{
    public function __construct(
        #[DataCollectionOf(Location::class)]
        public ?DataCollection $locations,
        public float $distance,
        public GeoCodeProvider $geocodeProvider,
        public DistanceUnit $distanceUnit,
        public ?string $geocodeProviderKey,
    ) {
    }
}