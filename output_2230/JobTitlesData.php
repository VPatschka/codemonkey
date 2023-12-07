<?php

namespace App\Libraries\Sovren\DataTransferObjects\Parser\Fragments\Response\ResumeDataFragments;

use App\Libraries\Sovren\DataTransferObjects\BaseDataTransferObject;

final class JobTitlesData extends BaseDataTransferObject
{
    /** @var array<string>|null */
    public ?array $found;

    /** @var array<string>|null */
    public ?array $notFound;

    public ?float $unweightedScore;

    /** @var array<EvidenceData>|null */
    public ?array $evidence;

    public function toArray(): array
    {
        return [
            'found' => $this->found,
            'notFound' => $this->notFound,
            'unweightedScore' => $this->unweightedScore,
            'evidence' => $this->evidence,
        ];
    }

    protected function castArray(string $fieldName): ?string
    {
        return match($fieldName) {
            'evidence' => EvidenceData::class,
            default => null,
        };
    }
}