<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public $timestamps = false;

    protected $table = 'categories';
    protected $fillable = [
        'name',
        'description'
    ];

    use HasFactory;

    public function movies()
    {
        return $this->belongsToMany(Movie::class, 'category_movie', 'category_id', 'movie_id');
    }
}
