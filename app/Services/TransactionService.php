<?php

namespace App\Services;

use App\Enums\CategoryTypeEnum;

class TransactionService
{
    public static function isExpenseType(string $type): bool
    {
        return $type === CategoryTypeEnum::expense()->value;
    }
}
