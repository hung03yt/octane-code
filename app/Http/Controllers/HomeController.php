<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Models\Movie;
class HomeController extends Controller
{
    public function index(){
        $movies = Movie::with('ratings')->get();
        return view('home', ['movies' => $movies]);
    }

    public function show(Movie $movie)
    {
        $ratings = $movie->ratings()->with('user')->get();
        $categories = $movie->categories()->get();
        return view('movie', [
            'movie' => $movie,
            'ratings' => $ratings,
            'categories' => $categories
        ]);
    }

    public function ratingAdd(Request $request, Movie $movie) {
        $request->validate([
            'userId' => 'required',
            'rateValue' => 'required',
        ]);

        $userId = $request->input('userId');
        $rateValue = $request->input('rateValue');
        $review = $request->input('review');
        $movieId = $movie->id;

        // Delete existing ratings for the same movie and user
        $existingRatings = Http::get('http://127.0.0.1:8000/api/ratings', [
            'movieId' => $movieId,
            'userId' => $userId,
        ]);

        if ($existingRatings->successful()) {
            $ratings = $existingRatings->json();
            foreach ($ratings as $rating) {
                Http::delete('http://127.0.0.1:8000/api/ratings/' . $rating['id']);
            }
        }

        // Add the new rating
        $data = [
            'movieId' => $movieId,
            'userId' => $userId,
            'rateValue' => $rateValue,
            'review' => $review,
        ];
        Http::post('http://127.0.0.1:8000/api/ratings', $data);

        return redirect()->back();
    }

    public function showCategory(Category $category) {
        $movies = $category->movies()->get();

        return view('category', [
            'category' => $category,
            'movies' => $movies
        ]);
    }

    public function dashBoard() {
        return view('welcome');
    }
}
