@extends('main')
@section('title', 'Category Info')
@section('content')
    <div style="display: none">{{auth()->user()}}</div>
    <div class="container-fluid bg-dark text-white px-5" style="min-height: 300px">
        <h3 class="py-3">{{$category["name"]}}</h3>
        <div class="row">
            <div class="col-auto">
                <img src="/image/movie.jpg" alt="image" style="max-width: 200px; height: auto">
            </div>
            <div class="col">
                <hr>
                <p class="movie_synopsis">{{$category["description"]}}</p>
            </div>
        </div>
    </div>

    <!-- Review Modal -->
    <div class="modal fade" id="reviewModal" tabindex="-1" aria-labelledby="reviewModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="reviewModalLabel">Submit your review</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="reviewForm" method="POST">
                        @csrf
                        <input type="hidden" name="userId" value="{{ auth()->user()->id }}">
                        <input type="hidden" name="rateValue" id="ratingInput">
                        <div class="mb-3">
                            <label for="review" class="form-label">Your review</label>
                            <textarea class="form-control" id="review" name="review" rows="3" required></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit Review</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <hr>
    <div class="container-fluid">
        <h4 class="mx-5">What to watch</h4>
        <div class="row px-5">
            <!-- Content -->
            @foreach($movies as $movie)
                <div class="col-xl-3 col-lg-4 col-md-6 col-12 movie_panel mb-5 pt-3" style="position: relative">
                    <img src={{asset($movie["img_path"])}} alt="image" class="movie_cover " width="150px" height="150px">
                    <div class="movie_content">
                        <a href="/movie/{{$movie["id"]}}" class="stretched-link"></a>
                        <span class="movie_name fw-bold" >{{$movie["name"]}}</span>
                        <span class="movie_rating">
                            @php
                                $averageRating = $movie->ratings->avg('rate_value');
                                $formattedRating = number_format($averageRating, 1);
                            @endphp
                            Ratings: {{ $formattedRating }} ({{ $movie->ratings->count() }} reviews)
                        </span>
                        <span class="movie_synopsis">{{$movie["synopsis"]}}</span>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
