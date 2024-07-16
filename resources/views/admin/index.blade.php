@extends('admin.main')
@section('title', 'Admin Home')
@section('content')
{{--    <div class="container-fluid bg-secondary row">--}}
{{--        <div class="row col-8 justify-content-start">--}}
{{--            <div class="col-auto ms-3">--}}
{{--                <a class="btn btn-secondary btn-md" href="{{route('admin.movie')}}">Movie</a>--}}
{{--            </div>--}}
{{--            <div class="col-auto">--}}
{{--                <a class="btn btn-secondary btn-md" href="{{route('admin.category')}}">Category</a>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
    <div class="d-flex" id="wrapper">
        <!-- Sidebar -->
        <div class="bg-light border-right" id="sidebar-wrapper">
            <div class="sidebar-heading">Admin Panel</div>
            <div class="list-group list-group-flush">
                <a href="/admin" class="list-group-item list-group-item-action bg-light">Dashboard</a>
                <a href="#" class="list-group-item list-group-item-action bg-light" data-bs-toggle="collapse" data-bs-target="#movieSubmenu" aria-expanded="false">
                    Movies
                    <i class="bi bi-caret-down-fill float-end"></i>
                </a>
                <div class="collapse" id="movieSubmenu">
                    <a href="/admin/movie" class="list-group-item list-group-item-action bg-light pl-4">All Movies</a>
                    <a href="/admin/movie/add" class="list-group-item list-group-item-action bg-light pl-4">Add Movie</a>
                </div>
                <a href="#" class="list-group-item list-group-item-action bg-light" data-bs-toggle="collapse" data-bs-target="#categorySubmenu" aria-expanded="false">
                    Categories
                    <i class="bi bi-caret-down-fill float-end"></i>
                </a>
                <div class="collapse" id="categorySubmenu">
                    <a href="/admin/category" class="list-group-item list-group-item-action bg-light pl-4">All Categories</a>
                    <a href="/admin/category/add" class="list-group-item list-group-item-action bg-light pl-4">Add Category</a>
                </div>
            </div>
        </div>

        <!-- Page Content -->
        <div id="page-content-wrapper">
            <!-- Your main content goes here -->
            <div class="container-fluid">
                <h1 class="mt-4">Welcome to Film Review Admin</h1>
                <!-- Add your content here -->
            </div>
        </div>
    </div>
@endsection
