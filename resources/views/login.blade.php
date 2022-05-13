@extends('layouts.layout')
@section('content')
<main class="login-form">
    <div class="container mt-5">
        <div class="mt-5 row justify-content-center">
            <div class="mt-5 col-md-4">
                <div class="mt-5 card">
                    <h3 class="card-header text-center"> {{ isset($url) ? ucwords($url) : '' }} Login</h3>
                    <div class="card-body">
                        @isset($url)
                            <form method="POST" action='{{ url("login/$url") }}' id="login-validate">
                        @endisset
                            @csrf
                            <div class="form-group mb-3">
                                <input type="text" placeholder="Email / Username" class="form-control" name="login" id="login" value="{{old('username') ?: old('email')}}">
                                <span class="jerror"></span>
                                @if ($errors->has('login')|| $errors->has('username') || $errors->has('email'))
                                    <span class="text-danger">{{$errors->first('login')}}</span>
                                    <span class="text-danger">{{$errors->first('username')}}</span>
                                    <span class="text-danger">{{$errors->first('email')}}</span>
                                @endif
                            </div>

                            <div class="form-group mb-3">
                                <input type="password" placeholder="Password" id="password" class="form-control" name="password" value="{{old('password')}}">
                                <span class="perror"></span>
                                @if ($errors->has('password'))
                                <span class="text-danger">{{ $errors->first('password') }}</span>
                                @endif
                            </div>
                            <div class="form-group mb-3">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="remember"> Remember Me
                                    </label>
                                </div>
                            </div>
                            <div class="d-grid mx-auto">
                                <button type="submit" class="btn btn-dark btn-block">Sign in</button>
                            </div>
                        </form>
                    </div>
                    @if(session()->has('message'))
                        <div class="px-3">
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                {{ session()->get('message') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</main>
@endsection
