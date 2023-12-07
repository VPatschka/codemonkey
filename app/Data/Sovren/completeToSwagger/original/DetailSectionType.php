<?php

namespace App\DataTransferObjects\Candidates\Matching;

enum DetailSectionType: string
{
    case Evidence = 'evidence';
    case List = 'list';
    case Grid = 'grid';
}