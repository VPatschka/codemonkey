export interface CategoryWeight {
    category?: string;
    weight: number;
}

export interface CategoryWeights {
  education?: number;
  jobTitles?: number;
  skills?: number;
  industries?: number;
  languages?: number;
  certifications?: number;
  executiveType?: number;
  managementLevel?: number;
  educationHasData?: boolean;
  jobTitlesHasData?: boolean;
  skillsHasData?: boolean;
  industriesHasData?: boolean;
  languagesHasData?: boolean;
  certificationsHasData?: boolean;
  executiveTypeHasData?: boolean;
  managementLevelHasData?: boolean;
}

export type DistanceUnit = "Miles" | "Kilometers";

export interface Education {
  schoolName?: string;
  degreeMajor?: string;
  degreeName?: string;
  degreeType?: string;
  minimumGPA: number;
}

export type ExperienceLevel = "Unknown" | "Low" | "Mid" | "High";

export type GeoCodeProvider = "None" | "Google" | "Bing";

export interface GeoPoint {
  latitude: number;
  longitude: number;
  source?: string;
  rawGeoCodeResponse?: string;
}

export interface IntegerRange {
  minimum: number;
  maximum: number;
}

export interface JobTitleSlim {
    title?: string;
    isCurrent: boolean;
}

export interface Location {
  countryCode?: string;
  region?: string;
  municipality?: string;
  postalCode?: string;
  geoPoint: GeoPoint;
}

export interface LocationCriteria {
  locations?: Location[];
  distance: number;
  geocodeProvider: GeoCodeProvider;
  distanceUnit: DistanceUnit;
  geocodeProviderKey?: string;
}

export interface MatchSettings {
  positionTitlesMustHaveAnExactMatch: boolean;
  positionTitlesIgnoreSingleWordVariations: boolean;
  normalizeJobTitles: boolean;
  normalizeJobTitlesLanguage?: string;
}

export interface Skill {
  skillName?: string;
  monthsOfExperienceRange: IntegerRange;
  isCurrent: boolean;
  experienceLevel: ExperienceLevel;
}

export interface StringRange {
    minimum?: string;
    maximum?: string;
}

export interface StructuredFilterCriteria {
  userDefinedTags?: string[];
  userDefinedTagsMustAllExist: boolean;
  documentIds?: string[];
  locationCriteria: LocationCriteria;
  searchExpression?: string;
  hasPatents?: boolean;
  hasSecurityCredentials?: boolean;
  securityCredentials?: string[];
  isAuthor?: boolean;
  isPublicSpeaker?: boolean;
  isMilitary?: boolean;
  educations?: Education[];
  schoolNames?: string[];
  degreeNames?: string[];
  degreeTypes?: string[];
  isTopStudent?: boolean;
  isCurrentStudent?: boolean;
  isRecentGraduate?: boolean;
  employers?: string[];
  employersMustAllBeCurrentEmployer: boolean;
  monthsExperience: IntegerRange;
  documentLanguages?: string[];
  skills?: Skill[];
  skillsMustAllExist: boolean;
  revisionDateRange: StringRange;
  jobTitles?: JobTitleSlim[];
  executiveType?: string[];
  certifications?: string[];
  monthsManagementExperience: IntegerRange;
  currentManagementLevel?: string;
  languagesKnown?: string[];
  languagesKnownMustAllExist: boolean;
  taxonomies?: string[];
  averageMonthsPerEmployer: IntegerRange;
  jobPredictiveIndex: IntegerRange;
}

export interface StructuredMatchRequestBase {
  preferredCategoryWeights: CategoryWeights;
  categoryWeights?: CategoryWeight[] | null;
  take: number;
  filterCriteria: StructuredFilterCriteria;
  settings: MatchSettings;
  indexIdsToSearchInto?: string[] | null;
}

