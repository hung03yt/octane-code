<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoryMovie extends Model
{
    use HasFactory;

    protected $table = 'category_movie';

    public $timestamps = false;
    protected $fillable = [
        'category_id',
        'movie_id'
    ];
    public function movies() {
        return $this->belongsTo(Movie::class);
    }
}
