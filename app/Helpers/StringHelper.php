<?php

namespace App\Helpers;

use Illuminate\Support\Str;

class StringHelper
{
    public static function ellipsis(string $text, int $lenght = 22): string
    {
        return Str::substr($text, 0, $lenght) . '...';
    }

    public static function acronym(string $text): string
    {
        return Str::take($text, 1);
    }
}