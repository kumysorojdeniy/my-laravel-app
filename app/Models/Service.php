<?php

namespace App\Models;

use App\ServiceType;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    protected $fillable = [
        'name',
        'type',
        'price',
        'description',
        'sort_order',
    ];

    protected $casts = [
        'type' => ServiceType::class,
    ];
}
