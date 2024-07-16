<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCategoryMovieRequest;
use App\Http\Requests\UpdateCategoryMovieRequest;
use App\Http\Resources\CategoryMovieResource;
use App\Models\CategoryMovie;
use App\Models\Movie;
use Illuminate\Support\Facades\Request;
class CategoryMovieController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCategoryMovieRequest $request)
    {
        return new CategoryMovieResource(CategoryMovie::create($request->all() ));
    }

    /**
     * Display the specified resource.
     */
    public function show(CategoryMovie $category)
    {
        return new CategoryMovieResource($category);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(CategoryMovie $category)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCategoryMovieRequest $request, CategoryMovie $category)
    {
        $category->update($request->all());
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(CategoryMovie $category)
    {
        $category->delete();
    }

    public function sync(Request $request)
    {
        $movie = Movie::findOrFail($request->input('movieId'));
        $movie->categories()->sync($request->input('categories'));
        return response()->json(['message' => 'Categories synced successfully']);
    }
}
