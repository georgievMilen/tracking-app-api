<?php

namespace App\Models;

use App\Models\Traits\UUIDPrimary;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Category extends Model
{
    use  UUIDPrimary, HasFactory;

    protected $table = 'categories';

    protected $hidden = [
        'created_at',
        'updated_at',
    ];

    protected $guarded = [
        'id',
        'created_at',
        'updated_at',
    ];

    public function transactions(): HasMany
    {
        return $this->hasMany(Transaction::class);
    }

    public function getTotalAmount(): int
    {
        return $this->transactions()->sum('amount');
    }

    public static function scopeType(Builder $query, string $type): Builder
    {
        return $query->where('type', $type);
    }
}
