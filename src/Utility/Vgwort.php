<?php

declare(strict_types=1);

namespace PathfinderMediaGroup\VgwortMetisApi\Utility;

class Vgwort
{
    private const LENGTH = 1800;

    public static function isTextLongEnough(string $text): bool
    {
        return strlen(strip_tags($text)) >= self::LENGTH;
    }
}
