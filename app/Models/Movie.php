<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    protected $fillable = [
        'name',
        'director',
        'release_date',
        'synopsis',
        'img_path'
    ];

    protected $table = 'movies';

    use HasFactory;

    public function ratings() {
        return $this->hasMany(Rating::class);
    }

    public function categories() {
        return $this->belongsToMany(Category::class, 'category_movie', 'movie_id', 'category_id');
    }
}
