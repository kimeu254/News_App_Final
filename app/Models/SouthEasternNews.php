<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SouthEasternNews extends Model
{
    use HasFactory;

    protected $fillable = [
        'headline',
        'image',
        'path',
        'story',
        'posted_by',
    ];
}
