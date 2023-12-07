<?php

namespace App\Libraries\Sovren\DataTransferObjects\Parser\Fragments\Response\ResumeDataFragments;

use App\Libraries\Sovren\DataTransferObjects\BaseDataTransferObject;

final class AddMultipleJobsToIndexRequestModel extends BaseDataTransferObject
{
    /** @var IndexJobRequest[]|null */
    public ?array $jobs;

    public function toArray(): array
    {
        return [
            'jobs' => $this->jobs,
        ];
    }

    protected function castArray(string $fieldName): ?string
    {
        return match($fieldName) {
            'jobs' => IndexJobRequest::class,
            default => null,
        };
    }
}