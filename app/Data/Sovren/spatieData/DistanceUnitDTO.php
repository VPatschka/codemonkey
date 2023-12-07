<?php

namespace App\DataTransferObjects\Candidates\Matching;

enum DistanceUnitDTO: string
{
    case Miles = 'Miles';
    case Kilometers = 'Kilometers';
}