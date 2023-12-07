<?php

namespace App\DataTransferObjects;

use Spatie\LaravelData\Data;

class IntegerRangeDTO extends Data
{
    public function __construct(
        public int $minimum,
        public int $maximum,
    ) {
    }
}