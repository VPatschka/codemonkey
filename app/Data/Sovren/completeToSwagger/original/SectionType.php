<?php

namespace App\DataTransferObjects\Candidates\Matching;

enum SectionType: string
{
    case Skills = 'skills';
    case JobTitles = 'jobTitles';
    case Education = 'education';
    case Industries = 'industries';
    case Management = 'managementLevel';
    case Certifications = 'certifications';
    case Languages = 'languages';
    case ExecutiveType = 'executiveType';
}
