<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FinalProject extends Model
{
    protected $fillable = [
        'title',
        'description',
        'problem',
        'main_feature',
        'tech_stack',
        'status',
        'progress',
        'erd_image',
        'year',
    ];

    protected $casts = [
        'features' => 'array',
        'stack' => 'array',
    ];
}