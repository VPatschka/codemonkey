<?php

namespace App\Libraries\Sovren\DataTransferObjects\Parser\Fragments\Response\ResumeDataFragments;

use App\Libraries\Sovren\DataTransferObjects\BaseDataTransferObject;

final class ContactInformationData extends BaseDataTransferObject
{
    public ?CandidateNameData $candidateName;

    /** @var TelephoneData[]|null */
    public ?array $telephones;

    /** @var string[]|null */
    public ?array $emailAddresses;

    public ?LocationData $location;

    /** @var WebAddressData[]|null */
    public ?array $webAddresses;

    public function toArray(): array
    {
        return [
            'candidateName' => $this->candidateName,
            'telephones' => $this->telephones,
            'emailAddresses' => $this->emailAddresses,
            'location' => $this->location,
            'webAddresses' => $this->webAddresses,
        ];
    }

    protected function castArray(string $fieldName): ?string
    {
        return match($fieldName) {
            'telephones' => TelephoneData::class,
            'webAddresses' => WebAddressData::class,
            default => null,
        };
    }
}