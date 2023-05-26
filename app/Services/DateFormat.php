<?php

declare(strict_types=1);

namespace App\Services;

use Carbon\Carbon;
class DateFormat
{
    public static function isoDateTime(?Carbon $date): ?string
    {
        if ($date) {
            return $date->toISOString(true);
        }

        return null;
    }

    public static function formatDate(?Carbon $date, string $format = 'Y-m-d'): ?string
    {
        if (! $date) {
            return null;
        }

        return $date->format($format);
    }
}
