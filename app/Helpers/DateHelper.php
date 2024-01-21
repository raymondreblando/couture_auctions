<?php

namespace App\Helpers;
use Illuminate\Support\Carbon;

class DateHelper
{
    public static function formatDate(string $date): string
    {
        return Carbon::parse($date)->format('M d, Y h:i A');
    }

    public static function timeRemaining(string $date): string
    {
        $bidEndDate = Carbon::parse($date);
        $now = now();

        $timeDiff = $now->diff($bidEndDate);

        if ($timeDiff->d > 0) {
            return $timeDiff->d . 'd ' . $timeDiff->h . 'h';
        } elseif ($timeDiff->h > 0) {
            return $timeDiff->h . 'h ' . $timeDiff->i . 'm';
        } elseif ($timeDiff->i > 0) {
            return $timeDiff->i . 'm ' . $timeDiff->s . 's';
        } else {
            return $timeDiff->s . 's';
        }
    }

    public static function isTimeEnded(string $date): bool
    {
        return now()->greaterThan(Carbon::parse($date));
    }
}