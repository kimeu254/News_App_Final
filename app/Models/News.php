<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    use HasFactory;

    protected $fillable = [
        'headline',
        'image',
        'path',
        'story',
        'posted_by',
        'south_eastern_id',
        'national_news_id',
        'international_news_id',
        'politics_id',
        'businesses_id',
        'sports_id',
        'lifestyles_id',
    ];
}
