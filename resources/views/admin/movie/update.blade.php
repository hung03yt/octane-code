@extends('main')
@section('title', 'Movie Update')
@section('content')
    <div class="container py-5" style="min-height: 600px">
        <form action="" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group py-3">
                <label>Name</label>
                <input type="text" class="form-control" value="{{$movie->name}}" name="name">
            </div>
            <div class="form-group py-3">
                <label>Director</label>
                <input type="text" class="form-control" value="{{$movie->director}}" name="director">
            </div>
            <div class="form-group py-3">
                <label>Release Date</label>
                <input type="date" class="form-control" value="{{$movie->release_date}}" name="releaseDate">
            </div>
            <div class="form-group py-3">
                <label>Synopsis</label>
                <textarea class="form-control" rows="3" name="synopsis">{{$movie->synopsis}}</textarea>
            </div>
            <div class="form-group py-3">
                <label>Movie cover</label>
                <input type="file" class="form-control-file" id="cover" name="image">
                <img src="{{ asset($movie->img_path) }}" alt="{{$movie->img_path}}" class="" width="70px" height="70px">
            </div>
            <div class="form-group py-3">
                <label>Categories</label>
                @foreach($categories->chunk(5) as $categoryChunk)
                    <div class="row">
                        @foreach($categoryChunk as $category)
                            <div class="form-check form-check-inline col">
                                <input class="form-check-input" type="checkbox" name="categories[]" value="{{ $category->id }}" id="category-{{ $category->id }}" {{ $movie->categories->contains($category->id) ? 'checked' : '' }}>
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
