@extends('main')
@section('title', 'Register')
@section('content')
    <div class="container py-5" style="min-height: 600px">
        <div class="mt-5">
            @if($errors->any())
                <div class="col-12">
                    @foreach($errors->all() as $error)
                        <div class="alert alert-danger">{{$error}}</div>
                    @endforeach
                </div>
            @endif

            @if(session()->has('error'))
                <div class="alert alert-danger">{{session('error')}}</div>
            @endif

            @if(session()->has('success'))
                <div class="alert alert-success">{{session('success')}}</div>
            @endif
        </div>
        <form action="{{route('register.post')}}" method="POST">
            @csrf
            <div class="form-group py-3">
                <label>Username</label>
                <input type="text" class="form-control" name="name">
            </div>
            <div class="form-group py-3">
                <label>Email</label>
                <input type="email" class="form-control" name="email">
            </div>
            <div class="form-group py-3">
                <label>Password</label>
                <input type="password" class="form-control" name="password">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
@endsection
