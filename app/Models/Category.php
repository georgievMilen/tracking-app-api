<?php

namespace App\Models;

use App\Models\Traits\UUIDPrimary;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
}
