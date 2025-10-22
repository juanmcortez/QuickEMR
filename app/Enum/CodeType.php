<?php

namespace App\Enum;

enum CodeType: string
{
    case ANES = 'anes';
    case CPT4 = 'cpt4';
    case CPTII = 'cptii';
    case CVX = 'cvx';
    case DSMIV = 'dsmiv';
    case HCPCS = 'hcpcs';
    case ICD10 = 'icd10';
    case ICD10PCS = 'icd10pcs';
    case ICD9 = 'icd9';
    case ICD9SG = 'icd9sg';
    case SNOMED = 'snomed';
    case SNOMEDCT = 'snomedct';
    case SNOMEDPR = 'snomedpr';

    // Helper method to get a random type
    public static function random(array $procedures): self
    {
        $cases = (empty($procedures)) ? self::cases() : $procedures;
        return $cases[array_rand($cases)];
    }

    // Get a random procedure code type (CPT4, HCPCS, ANES, or CVX)
    public static function randomProcedureCode(): self
    {
        $procedureCodes = [
            self::CPT4,
            self::HCPCS,
            self::ANES,
            self::CVX,
        ];
        return self::random($procedureCodes);
    }

    // Get all values as array
    public static function values(): array
    {
        return array_column(self::cases(), 'value');
    }

    // Get human-readable label
    public function label(): string
    {
        return match ($this) {
            self::ANES => 'Anesthesia',
            self::CPT4 => 'CPT-4',
            self::CPTII => 'CPT-II',
            self::CVX => 'CVX (Vaccines)',
            self::DSMIV => 'DSM-IV',
            self::HCPCS => 'HCPCS',
            self::ICD10 => 'ICD-10',
            self::ICD10PCS => 'ICD-10-PCS',
            self::ICD9 => 'ICD-9',
            self::ICD9SG => 'ICD-9-SG',
            self::SNOMED => 'SNOMED',
            self::SNOMEDCT => 'SNOMED CT',
            self::SNOMEDPR => 'SNOMED PR',
        };
    }
}
