<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Business extends Model
{
    use HasFactory;

    protected $fillable = [
        'headline',
        'image',
        'path',
        'story',
        'posted_by',
        'image_one',
        'path_one',
        'story_one',
        'image_two',
        'path_two',
        'story_two',
    ];
}
