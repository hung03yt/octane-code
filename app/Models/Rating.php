<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rating extends Model
{
    use HasFactory;

    protected $fillable = [
        'movie_id',
        'user_id',
        'rate_value',
        'review'
    ];

    protected $table = 'ratings';

    public function movie() {
        return $this->belongsTo(Movie::class);
    }

    public function user() {
        return $this->belongsTo(User::class);
    }
}
