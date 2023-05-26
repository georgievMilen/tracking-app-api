<?php

namespace App\Enums;

use Spatie\Enum\Enum;

/**
 * Class CategoryTypeEnum.
 *
 * @method static self income()
 * @method static self expense()
 */
class CategoryTypeEnum extends Enum
{
    protected static function labels(): array
    {
        return [
            'income'  => 'Income',
            'expense' => 'Expenses',
        ];
    }
}
