@extends('main')
@section('title', 'Home')
@section('content')
    <div style="display: none">{{auth()->user()}}</div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-8 justify-content-start mt-5 ps-5">
                <!-- Slider -->
                <div id="carouselExampleAutoplaying" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img src="MovieCover/60/good_imge.png" class="d-block w-100" alt="First slide" style="height: 550px">
                            <div class="carousel-caption d-none d-md-block">
                                <h5>First slide label</h5>
                                <p>Some representative placeholder content for the first slide.</p>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <img src="image/square.jpg" class="d-block w-100" alt="Second slide" style="height: 550px">
                            <div class="carousel-caption d-none d-md-block">
                                <h5>First slide label</h5>
                                <p>Some representative placeholder content for the first slide.</p>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <img src="image/Ksante.jpg" class="d-block w-100" alt="Third slide" height="550px">
                            <div class="carousel-caption d-none d-md-block">
                                <h5>First slide label</h5>
                                <p>Some representative placeholder content for the first slide.</p>
                            </div>
                        </div>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
            </div>

            <!-- Cards -->
            <div class="col-4 justify-content-start pe-5 d-lg-block d-none">
                <h5 class="mt-5 mb-3">Recommended for you</h5>
                <div class="card mb-3 pt-0" style="max-width: 480px;">
                    <div class="row g-0">
                        <div class="col-4">
                            <img src="MovieCover/60/good_imge.png" class="img-fluid rounded-start" alt="Recommended" style=" width: 100%; height: auto;">
                        </div>
                        <div class="col-8">
                            <div class="card-body">
                                <a href="/login" class="card-title recommended_movie_name fw-bold stretched-link link-underline link-underline-opacity-0">
                                    movie 1aaa aaaa aaa aaaa aaa aassf aaa aaaa aaa aaaa aaa aassf aaa aaaa aaa aaaa aaa aassf aaa
                                </a>
                                <span class="card-text recommended_movie_category">Action, Horror</span>
                                <span class="card-text recommended_movie_rating">4.5</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card mb-3 pt-0" style="max-width: 480px;">
                    <div class="row g-0">
                        <div class="col-4">
                            <img src="MovieCover/60/good_imge.png" class="img-fluid rounded-start" alt="Recommended" style=" width: 100%; height: auto;">
                        </div>
                        <div class="col-8">
                            <div class="card-body">
                                <a href="/login" class="card-title recommended_movie_name fw-bold stretched-link">movie 1aaa aaaa aaa aaaa aaa aassf aaa aaaa aaa aaaa aaa aassf aaa aaaa aaa aaaa aaa aassf aaa</a>
                                <span class="card-text recommended_movie_category">Action, Horror</span>
                                <span class="card-text recommended_movie_rating">4.5</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card mb-3 pt-0" style="max-width: 480px;">
                    <div class="row g-0">
                        <div class="col-4">
                            <img src="MovieCover/60/good_imge.png" class="img-fluid rounded-start" alt="Recommended" style=" width: 100%; height: auto;">
                        </div>
                        <div class="col-8">
                            <div class="card-body">
                                <a href="/login" class="card-title recommended_movie_name fw-bold stretched-link">movie 1aaa aaaa aaa aaaa aaa aassf aaa aaaa aaa aaaa aaa aassf aaa aaaa aaa aaaa aaa aassf aaa</a>
                                <span class="card-text recommended_movie_category">Action, Horror</span>
                                <span class="card-text recommended_movie_rating">4.5</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
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
