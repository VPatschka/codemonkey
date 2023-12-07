<?php

namespace App\Libraries\Sovren\DataTransferObjects\Parser\Fragments\Response\ResumeDataFragments;

enum EvidenceType: string
{
    case Negative = 'Negative';
    case Mixed = 'Mixed';
    case Positive = 'Positive';
}