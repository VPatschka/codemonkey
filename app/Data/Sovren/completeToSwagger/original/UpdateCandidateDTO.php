<?php

namespace App\DataTransferObjects\Candidates;

use App\DataTransferObjects\AddressDTO;
use App\DataTransferObjects\EmailDTO;
use App\DataTransferObjects\PhoneNumberDTO;
use App\DataTransferObjects\TargetLocationDTO;
use App\Helpers\UrlHelper;
use App\Http\Requests\Candidate\StoreCandidateRequest;
use App\Interfaces\PartiallyUpdatableRequestInterface;
use App\Libraries\Sovren\DataTransferObjects\Parser\Fragments\Response\ResumeData;
use App\Libraries\Sovren\DataTransferObjects\Parser\Fragments\Response\ResumeDataFragments\TelephoneData;
use App\Models\Candidate;
use App\Models\Language;
use App\Util\ListFieldSanitizer;
use Spatie\LaravelData\Attributes\Computed;
use Spatie\LaravelData\Attributes\DataCollectionOf;
use Spatie\LaravelData\Attributes\MapInputName;
use Spatie\LaravelData\Attributes\MapOutputName;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\DataCollection;
use Spatie\LaravelData\Mappers\SnakeCaseMapper;
use Spatie\LaravelData\Optional;

class UpdateCandidateDTO extends Data
{
    /**
     * @param string|Optional|null $firstName
     * @param string|Optional|null $lastName
     * @param int|Optional|null $employerId
     * @param string|Optional|null $jobTitle
     * @param string|Optional|null $profileUrl
     * @param array|Optional $industries
     * @param array|Optional $markets
     * @param array|Optional $languages
     * @param array|Optional $skills
     * @param array|Optional $specialisms
     * @param AddressDTO|Optional|null $address
     * @param DataCollection<TargetLocationDTO>|Optional $targetLocation
     * @param int|Optional|null $candidateStatus
     * @param DataCollection<PhoneNumberDTO>|Optional $phoneNumber
     * @param DataCollection<EmailDTO>|Optional $email
     * @param array|Optional $contractType
     * @param array|Optional $seniority
     * @param array|Optional $certifications
     * @param int|Optional|null $source
     * @param int|Optional|null $gdpr
     * @param int|Optional|null $contactStatus
     * @param bool|Optional $isWorldwide
     */
    public function __construct(
        public null|string|Optional $firstName,
        public null|string|Optional $lastName,
        public null|int|Optional $employerId,
        public null|string|Optional $jobTitle,
        public null|string|Optional $profileUrl,
        public array|Optional $industries,
        public array|Optional $markets,
        public array|Optional $languages,
        public array|Optional $skills,
        public array|Optional $specialisms,
        public null|AddressDTO|Optional $address,
        #[DataCollectionOf(TargetLocationDTO::class)]
        public DataCollection|Optional $targetLocation,
        public null|int|Optional $candidateStatus,
        #[DataCollectionOf(PhoneNumberDTO::class)]
        public DataCollection|Optional $phoneNumber,
        #[DataCollectionOf(EmailDTO::class)]
        public DataCollection|Optional $email,
        public array|Optional $contractType,
        public array|Optional $seniority,
        public array|Optional $certifications,
        public null|int|Optional $source,
        public null|int|Optional $gdpr,
        public null|int|Optional $contactStatus,
        public bool|Optional $isWorldwide,
    ) {
    }
}
