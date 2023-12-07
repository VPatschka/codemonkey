<?php

namespace App\DataTransferObjects;

use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

class GeoPointDTO extends Data
{
    public function __construct(
        public float $latitude,
        public float $longitude,
        public string|Optional $source,
        public string|Optional $rawGeoCodeResponse,
    ) {
    }
}