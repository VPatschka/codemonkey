<?php

namespace App\Libraries\Sovren\DataTransferObjects\Parser\Fragments\Response\ResumeDataFragments;

use App\Libraries\Sovren\DataTransferObjects\BaseDataTransferObject;

final class ApplicationDetails extends BaseDataTransferObject
{
    public ?string $applicationDescription;
    public ?string $contactPerson;
    public ?string $contactPhone;
    public ?string $contactEmail;
    public ?string $website;
    public ?DateTimeSovrenPrimitive $applicationDeadline;
    public ?DateTimeSovrenPrimitive $postedDate;
    public ?string $referenceNumber;

    public function toArray(): array
    {
        return [
            'applicationDescription' => $this->applicationDescription,
            'contactPerson' => $this->contactPerson,
            'contactPhone' => $this->contactPhone,
            'contactEmail' => $this->contactEmail,
            'website' => $this->website,
            'applicationDeadline' => $this->applicationDeadline,
            'postedDate' => $this->postedDate,
            'referenceNumber' => $this->referenceNumber,
        ];
    }
}