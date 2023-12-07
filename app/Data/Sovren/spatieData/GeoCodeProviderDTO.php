<?php

namespace App\DataTransferObjects\Candidates\Matching;

enum GeoCodeProviderDTO: string
{
    case None = 'None';
    case Google = 'Google';
    case Bing = 'Bing';
}