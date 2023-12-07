<?php

namespace App\DataTransferObjects;

use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

class LocationDTO extends Data
{
    public function __construct(
        public string|Optional $countryCode,
        public string|Optional $region,
        public string|Optional $municipality,
        public string|Optional $postalCode,
        public GeoPointDTO $geoPoint
    ) {
    }
}