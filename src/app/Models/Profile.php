<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $fillable = [
        'photo',
        'badge',
        'name',
        'tagline',
        'about_me',
        'tech_stack',
    ];
}
