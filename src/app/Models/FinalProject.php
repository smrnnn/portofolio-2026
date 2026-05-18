<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FinalProject extends Model
{
    protected $fillable = [
        'title',
        'program',
        'description',
        'solution',
        'problem',
        'main_feature',
        'tech_stack',
        'status',
        'progress',
        'thumbnail',
        'erd_image',
        'year',
    ];

    protected $casts = [
        'features' => 'array',
        'stack' => 'array',
    ];
}