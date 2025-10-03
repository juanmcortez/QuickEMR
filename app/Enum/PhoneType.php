<?php

namespace App\Enum;

enum PhoneType: string
{
    case Home = 'home';
    case Work = 'work';
    case Mobile = 'mobile';
    case Fax = 'fax';
    case Other = 'other';


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
