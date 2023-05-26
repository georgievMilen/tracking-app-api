<?php

namespace App\Services;

use App\Enums\CategoryTypeEnum;

class DashboardDataService
{
    public static function getData(): array
    {
        return [
            'category_types' => CategoryTypeEnum::toArray(),
        ];
    }
}
