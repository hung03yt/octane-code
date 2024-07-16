@extends('admin.main')
@section('title', 'Category List')

@section('content')
    <table class="table">
        <thead>
            <tr scope="col">
                <th style="width: 50px" scope="col">ID</th>
                <th scope="col">Name</th>
                <th scope="col">Description</th>
                <th scope="col">Update</th>
            </tr>
        </thead>
        <tbody>
        @foreach($categories as $key=> $category)
            <tr>
                <th scope="col"> {{ $category->id }}</th>
                <td> {{ $category->name }} </td>
                <td> {{ $category->description }} </td>
                <td style="min-width: 100px">
                    <a class="btn btn-primary btn-sm" href="/admin/category/update/{{ $category->id }}">
                        <i class="bi bi-pen"></i>
                    </a>
                    <form action="/admin/category/delete/{{ $category->id }}" method="POST" style="display: inline-block;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this category?')">
                            <i class="bi bi-trash"></i>
                        </button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
