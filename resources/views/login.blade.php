@extends('main')
@section('title', 'Login')
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
        <form action="{{route('login.post')}}" method="POST">
            @csrf
            <div class="form-group py-3">
                <label class="form-label">Email address</label>
                <input type="text" class="form-control" name="email">
            </div>
            <div class="form-group py-3">
                <label class="form-label">Password</label>
                <input type="password" class="form-control" name="password">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
@endsection