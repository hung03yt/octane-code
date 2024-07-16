@extends('main')
@section('title', 'Movie Add')
@section('content')
    <div class="container py-5" style="min-height: 600px">
        <form action="" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group py-3">
                <label>Name</label>
                <input type="text" class="form-control" name="name">
            </div>
            <div class="form-group py-3">
                <label>Director</label>
                <input type="text" class="form-control" name="director">
            </div>
            <div class="form-group py-3">
                <label>Release Date</label>
                <input type="date" class="form-control" name="releaseDate">
            </div>
            <div class="form-group py-3">
                <label>Synopsis</label>
                <textarea class="form-control" rows="3" name="synopsis"></textarea>
            </div>
            <div class="form-group py-3">
                <label>Movie cover</label>
                <input type="file" class="form-control-file" id="cover" name="image">
            </div>
            <div class="form-group py-3">
                <label>Categories</label>
                @foreach($categories->chunk(5) as $categoryChunk)
                    <div class="row">
                        @foreach($categoryChunk as $category)
                            <div class="form-check form-check-inline col">
                                <input class="form-check-input" type="checkbox" name="categories[]" value="{{ $category->id }}" id="category-{{ $category->id }}">
                                <label class="form-check-label" for="category-{{ $category->id }}">{{ $category->name }}</label>
                            </div>
                        @endforeach
                    </div>
                @endforeach
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
@endsection
