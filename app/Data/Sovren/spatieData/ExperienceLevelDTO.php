<?php

namespace App\DataTransferObjects\Candidates\Matching;

enum ExperienceLevelDTO: string
{
    case Unknown = 'Unknown';
    case Low = 'Low';
    case Mid = 'Mid';
    case High = 'High';
}