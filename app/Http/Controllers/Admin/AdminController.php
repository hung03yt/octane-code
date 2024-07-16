<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Movie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;


class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view ('admin.index');
    }

    public function movie() {
        return view ('admin.movie', [
            'movies' => Movie::all()
        ]);
    }

    public function movieAdd() {
        return view ('admin.movie.add', [
            'categories' => Category::all()
        ]);
    }

    public function movieStore(Request $request) {
        $request->validate([
            'name' => 'required',
            'director' => 'required',
            'releaseDate' => 'required',
            'synopsis' => 'required',
            'image' => 'required',
            'categories' => 'array'
        ]);
        $name = $request->input('name');
        $director = $request->input('director');
        $releaseDate = $request->input('releaseDate');
        $synopsis = $request->input('synopsis');
        $tempImgPath = "Default image path";

        $data = [
            "name" => $name,
            "director"=> $director,
            "releaseDate"=> $releaseDate,
            "synopsis"=> $synopsis,
            "imgPath"=> $tempImgPath
        ];
        $response = Http::post('http://127.0.0.1:8000/api/movies', $data);
        if ($response->successful()) {
            $movieId = $response->json('data.id');
            $categories = $request->input('categories', []);
            if ($request->hasFile("image")) {
                $image = $request->file("image");
                $imageName = Str::snake($image->getClientOriginalName());
                $image->move(public_path('MovieCover/' . $movieId), $imageName);
                $imagePath = 'MovieCover/' . $movieId . '/' . $imageName;

                $imagePathData = [
                    "imgPath"=> $imagePath
                ];
                $response = Http::patch('http://127.0.0.1:8000/api/movies/' . $movieId, $imagePathData);
            }
            $movie = Movie::findOrFail($movieId);
            $movie->categories()->sync($categories);
        }
        return redirect('/admin/movie');
    }

    public function movieShow(Movie $movie) {
        return view ('admin.movie.update', [
            'movie' => $movie,
            'categories' => Category::all()
        ]);
    }

    public function movieUpdate(Movie $movie, Request $request) {
        $request->validate([
            'name' => 'required',
            'director' => 'required',
            'releaseDate' => 'required',
            'synopsis' => 'required',
            'categories' => 'array'
        ]);
        if ($request->hasFile("image")) {
            File::delete(public_path($movie->img_path));
            $image = $request->file("image");
            $imageName = Str::snake($image->getClientOriginalName());
            $image->move(public_path('MovieCover/' . $movie->id), $imageName);
            $imagePath = 'MovieCover/' . $movie->id . '/' . $imageName;
        }
        else {
            $imagePath = $movie->img_path;
        }
        $name = $request->input('name');
        $director = $request->input('director');
        $releaseDate = $request->input('releaseDate');
        $synopsis = $request->input('synopsis');
        $data = [
            "name" => $name,
            "director"=> $director,
            "releaseDate"=> $releaseDate,
            "synopsis"=> $synopsis,
            "imgPath"=> $imagePath
        ];
        $response = Http::patch('http://127.0.0.1:8000/api/movies/' . $movie->id, $data);
        $categories = $request->input('categories', []);
        $movie->categories()->sync($categories);
        return redirect('/admin/movie');
    }

    public function movieDelete(Movie $movie) {
        $movie->categories()->sync([]);
        Http::delete('http://127.0.0.1:8000/api/movies/' . $movie->id);
        return redirect('/admin/movie');
    }

    public function category() {
        return view('admin.category', [
            'categories' => Category::all()
        ]);
    }

    public function categoryAdd() {
        return view('admin.category.add');
    }

    public function categoryStore(Request $request) {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
        ]);
        $name = $request->input('name');
        $description = $request->input('description');
        $data = [
            "name" => $name,
            "description" => $description
        ];
        $response = Http::post('http://127.0.0.1:8000/api/categories', $data);
        return redirect('/admin/category');
    }

    public function categoryShow(Category $category) {
        return view ('admin.category.update', [
            'category' => $category
        ]);
    }

    public function categoryUpdate(Category $category, Request $request) {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
        ]);
        $name = $request->input('name');
        $description = $request->input('description');
        $data = [
            "name" => $name,
            "description" => $description
        ];
        Http::patch('http://127.0.0.1:8000/api/categories/' . $category->id, $data);
        return redirect('/admin/category');
    }

    public function categoryDelete(Category $category) {
        $category->movies()->sync([]);
        Http::delete('http://127.0.0.1:8000/api/categories/' . $category->id);
        return redirect('/admin/category');
    }
}
