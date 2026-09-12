<?php

namespace App\Models;

use App\PortfolioCategory;
use Illuminate\Database\Eloquent\Model;

class PortfolioItem extends Model
{
    protected $fillable = [
        'title',
        'category',
        'image',
        'description',
        'sort_order',
    ];

    protected $casts = [
        'category' => PortfolioCategory::class,
    ];
}
