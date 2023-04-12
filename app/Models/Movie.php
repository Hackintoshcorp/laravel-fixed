<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    use HasFactory;

    protected $table = 'movies_list';

    protected $fillable = [
        'email',
        'title',
        'description',
        'url',
        'img',
        'seen',
        'watch_soon',
    ];
}
