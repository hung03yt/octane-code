@extends('admin.main')
@section('title', 'Movie List')

@section('content')
    <table class="table">
        <thead>
            <tr scope="col">
                <th style="width: 50px" scope="col">ID</th>
                <th scope="col">Name</th>
                <th scope="col">Director</th>
                <th scope="col">Release date</th>
                <th scope="col">Synopsis</th>
                <th scope="col">Image path</th>
                <th scope="col">Update</th>
            </tr>
        </thead>
        <tbody>
        @foreach($movies as $key=> $movie)
            <tr>
                <th scope="row"> {{ $movie->id }}</th>
                <td> {{ $movie->name }} </td>
                <td> {{ $movie->director }} </td>
                <td> {{ $movie->release_date }} </td>
                <td> {{ $movie->synopsis }} </td>
                <td> {{ $movie->img_path }} </td>
                <td>
                    <a class="btn btn-primary btn-sm" href="/admin/movie/update/{{ $movie->id }}">
                        <i class="bi bi-pen"></i>
                    </a>
                    <form action="/admin/movie/delete/{{ $movie->id }}" method="POST" style="display: inline-block;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this movie?')">
                            <i class="bi bi-trash"></i>
                        </button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
