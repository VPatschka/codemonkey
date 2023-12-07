```php
<?php

final class EnrichedScoreData
{
    public ?LanguagesData $languages;
    public ?CertificationsData $certifications;
    public ?ExecutiveTypeData $executiveType;
    public ?EducationData $education;
    public ?TaxonomiesData $taxonomies;
    public ?JobTitlesData $jobTitles;
    public ?SkillsData $skills;
    public ?ManagementLevelData $managementLevel;

    public function toArray(): array
    {
        return [
            'languages' => $this->languages,
            'certifications' => $this->certifications,
            'executiveType' => $this->executiveType,
            'education' => $this->education,
            'taxonomies' => $this->taxonomies,
            'jobTitles' => $this->jobTitles,
            'skills' => $this->skills,
            'managementLevel' => $this->managementLevel,
        ];
    }
}
```