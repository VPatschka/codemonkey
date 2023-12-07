export interface CategoryScore {
    category?: string | null;
    unweightedScore: number;
    termsFound?: string[] | null;
}export interface CategoryScoresContainer {
  languages: SimpleCategoryScore;
  certifications: SimpleCategoryScore;
  executiveType: SimpleCategoryScore;
  education: EducationCategoryScore;
  taxonomies: TaxonomiesCategoryScore;
  jobTitles: JobTitlesCategoryScore;
  skills: SkillsCategoryScore;
  managementLevel: ManagementCategoryScore;
}export interface CategoryWeights {
  education: number;
  jobTitles: number;
  skills: number;
  industries: number;
  languages: number;
  certifications: number;
  executiveType: number;
  managementLevel: number;
  educationHasData: boolean;
  jobTitlesHasData: boolean;
  skillsHasData: boolean;
  industriesHasData: boolean;
  languagesHasData: boolean;
  certificationsHasData: boolean;
  executiveTypeHasData: boolean;
  managementLevelHasData: boolean;
}export interface CustomerDetails {
  accountId?: string;
  name?: string;
  ipAddress?: string;
  region?: string;
  creditsRemaining: number;
  creditsUsed: number;
  expirationDate?: string;
  maximumConcurrentRequests: number;
}interface EducationCategoryScore {
  expectedEducation?: string | null;
  actualEducation?: string | null;
  comparison: EducationComparison;
  unweightedScore: number;
  evidence?: Evidence[] | null;
}type EducationComparison = "DoesNotMeetExpected" | "MeetsExpected" | "ExceedsExpected";

export interface Evidence {
  fact?: string | null;
  type: EvidenceType;
}

type EvidenceType = "Negative" | "Mixed" | "Positive";

export interface JobTitleInfo {
    rawTerm?: string;
    variationOf?: string;
    isCurrent: boolean;
}export interface JobTitlesCategoryScore {
  found?: JobTitleInfo[];
  notFound?: string[];
  unweightedScore: number;
  evidence?: Evidence[];
}export interface ManagementCategoryScore {
  actual: ManagementLevelType;
  desired: ManagementLevelType;
  amountOfExperienceMatches: boolean;
  unweightedScore: number;
  evidence?: Evidence[];
}type ManagementLevelType = "Unknown" | "None" | "Low" | "Mid" | "High";

export interface MatchResult {
  id?: string;
  weightedScore: number;
  unweightedCategoryScores?: CategoryScore[];
  enrichedScoreData: CategoryScoresContainer;
  enrichedRCSScoreData: CategoryScoresContainer;
  reverseCompatibilityScore: number;
  indexId?: string;
  sovScore: number;
}
type ResponseInfoSubCode = 
  | "Success"
  | "SomeErrors"
  | "MissingParameter"
  | "InvalidParameter"
  | "InsufficientData"
  | "AuthenticationError"
  | "Unauthorized"
  | "DataNotFound"
  | "CoordinatesNotFound"
  | "UnhandledException"
  | "ConversionException"
  | "PossibleTruncationFromTimeout"
  | "WarningsFoundDuringParsing"
  | "ConstraintError"
  | "DuplicateAsset"
  | "UnsupportedContentTypeHeader"
  | "InstallationError"
  | "TooManyRequests"
  | "MaintenanceMode"
  | "Conflict"
  | "RequestTooLarge"
  | "SystemWarning"
  | "ServiceUnavailable"
  | "Timeout";

export interface SimpleCategoryScore {
  found?: string[];
  notFound?: string[];
  unweightedScore: number;
  evidence?: Evidence[];
}export interface SkillInfo {
    skill?: string | null;
    isCurrent: boolean;
}export interface SkillsCategoryScore {
  found?: SkillInfo[];
  notFound?: string[];
  unweightedScore: number;
  evidence?: Evidence[];
}export interface StructuredMatchResponse {
  matches?: MatchResult[] | null;
  currentCount: number;
  suggestedCategoryWeights: CategoryWeights;
  appliedCategoryWeights: CategoryWeights;
  elapsedMilliseconds: number;
  totalCount: number;
}export interface StructuredMatchResponseStructuredResponseModel {
  info: StructuredResponseInfoModel;
  value: StructuredMatchResponse;
}interface StructuredResponseInfoModel {
  code: ResponseInfoSubCode;
  message?: string | null;
  transactionId?: string | null;
  engineVersion?: string | null;
  apiVersion?: string | null;
  totalElapsedMilliseconds: number;
  transactionCost: number;
  customerDetails: CustomerDetails;
}export interface TaxonomiesCategoryScore {
  actualTaxonomies: TaxonomyEvidence;
  desiredTaxonomies: TaxonomyEvidence;
  unweightedScore: number;
  evidence?: Evidence[];
}export interface TaxonomyEvidence {
  primary: TaxonomyInfo;
  secondary: TaxonomyInfo;
}export interface TaxonomyInfo {
    taxonomy: TaxonomyMatchInfo;
    subtaxonomy: TaxonomyMatchInfo;
}export interface TaxonomyMatchInfo {
    name?: string;
    id?: string;
    matched: boolean;
}