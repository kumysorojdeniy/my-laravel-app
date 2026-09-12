<?php

namespace App\Models;

use App\OrderStatus;
use App\PaintingOption;
use App\PrintTechnology;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'name',
        'contact',
        'technology',
        'painting',
        'assembly',
        'scale',
        'file_path',
        'comment',
        'status',
    ];

    protected $casts = [
        'assembly' => 'boolean',
        'status' => OrderStatus::class,
        'technology' => PrintTechnology::class,
        'painting' => PaintingOption::class,
    ];
}
