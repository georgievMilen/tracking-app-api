<?php

declare(strict_types=1);

namespace App\Models;

use App\Models\Traits\ActiveScope;
use App\Models\Traits\UUIDPrimary;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Currency extends Model
{
    use SoftDeletes,
        UUIDPrimary,
        HasFactory,
        ActiveScope;

    protected $table = 'currencies';

    protected $hidden = [
        'created_at',
        'updated_at',
    ];

    protected $guarded = [
        'id',
        'created_at',
        'updated_at',
    ];

    protected $casts = [
        'active' => 'boolean',
    ];

    public static function getCurrencyByCode(string $code): ?self
    {
        return static::where('code', $code)->first();
    }
}
