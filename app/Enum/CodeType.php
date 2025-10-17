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

    // Optional: Helper method to get a random type
    public static function random(): self
    {
        $cases = self::cases();
        return $cases[array_rand($cases)];
    }

    // Optional: Get all values as array
    public static function values(): array
    {
        return array_column(self::cases(), 'value');
    }
}
