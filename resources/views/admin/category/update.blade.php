@extends('main')
@section('title', 'Category Update')
@section('content')
    <div class="container py-5" style="min-height: 600px">
        <form action="" method="POST">
            @csrf
            <div class="form-group py-3">
                <label>Name</label>
                <input type="text" class="form-control" name="name" value="{{$category->name}}">
            </div>
            <div class="form-group py-3">
                <label>Description</label>
                <textarea class="form-control" rows="3" name="description">{{$category->description}}</textarea>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
@endsection