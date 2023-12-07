<?php

namespace App\DataTransferObjects;

use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

class EducationDTO extends Data
{
    public function __construct(
        public string|Optional $schoolName,
        public string|Optional $degreeMajor,
        public string|Optional $degreeName,
        public string|Optional $degreeType,
        public float|Optional $minimumGPA,
    ) {
    }
}