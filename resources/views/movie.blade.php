@extends('main')
@section('title', 'Movie Info')
@section('content')
    <div style="display: none">{{auth()->user()}}</div>
    <div class="container-fluid bg-dark text-white px-5" style="min-height: 300px">
        <h3 class="py-3">{{$movie["name"]}}</h3>
        <div class="row">
            <div class="col-auto">
                <img src="{{ asset($movie["img_path"])}}" alt="image" style="max-width: 200px; height: auto">
            </div>
            <div class="col">
                <p>
                    @foreach($categories as $category)
                        <a role="button" class="btn btn-light" href="/category/{{$category["id"]}}">{{$category["name"]}}</a>
                    @endforeach
                </p>
                <hr>
                <p>Director: {{$movie["director"]}}</p>
                <hr>
                <p class="movie_synopsis">{{$movie["synopsis"]}}</p>
            </div>
            <div class="col-4 text-center d-lg-block d-none">
                <div class="total_rating">
                    <h4>Viewer rating:</h4>
                    <i class="bi bi-star-fill" style="font-size: 3rem; color: gold"></i>
                    @php
                        $averageRating = $movie->ratings->avg('rate_value');
                        $formattedRating = number_format($averageRating, 1);
                    @endphp
                    <h4>{{$formattedRating}}</h4>
                </div>
                <div class="rating mt-2" id="star-rating">
                    @auth
                        @for ($i = 1; $i <= 5; $i++)
                            <i class="bi bi-star" data-value="{{ $i }}"></i>
                        @endfor
                    @else
                        <div class="text_center">
                            <h4>Login to rate this movie</h4>
                        </div>
                    @endauth
                </div>
            </div>
        </div>
    </div>

    <!-- Review Modal -->
    @auth
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
    @endauth
    <hr>
    <h3 class="ms-5">Reviews</h3>
    <table class="table ms-5">
        <thead>
            <tr>
                <th scope="col">Id</th>
                <th scope="col">Rating</th>
                <th scope="col">Review</th>
            </tr>
        </thead>
        <tbody>
        @if($ratings->count() > 0)
            @foreach($ratings as $rating)
            <tr>
                <td>{{$rating->user->name}}</td>
                <td>{{$rating->rate_value}}</td>
                <td>{{$rating->review}}</td>
            </tr>
            @endforeach
        @else
            <p>No ratings found for this movie.</p>
        @endif
        </tbody>
    </table>
@endsection
