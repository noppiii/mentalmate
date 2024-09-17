<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SiteIdentity extends Model
{
    use HasFactory;

    protected $fillable = [
        'name_website',
        'email',
        'logo',
        'contact',
        'address',
        'social_instagram',
        'social_facebook',
        'social_linkedin',
        'social_x',
    ];
}
