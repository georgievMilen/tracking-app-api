<?php

namespace App\Models\Traits;

use Illuminate\Support\Str;

trait UUIDPrimary
{
    /**
     * This is automatically called by Laravel when the trait is used in a model.
     * https://laravel.com/docs/5.0/eloquent#global-scopes.
     */
    public static function bootUUIDPrimary(): void
    {
        static::creating(function ($model) {
            $model->uuid = Str::uuid();
        });
    }

    public static function getByUUID(string $uuid): mixed
    {
        return static::where('uuid', $uuid)->firstOrFail();
    }

    public static function getByExternalID(string $externalId): mixed
    {
        return static::where('external_id', $externalId)->firstOrFail();
    }
}
