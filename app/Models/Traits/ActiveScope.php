<?php

namespace App\Models\Traits;

use Illuminate\Database\Eloquent\Builder;


trait ActiveScope
{
    public function scopeActive(Builder $query): Builder
    {
        return $query->where('active', true);
    }
}
