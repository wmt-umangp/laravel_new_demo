@extends('layouts.layout')
@section('content')
<main class="signup-form">
    <div class="container mt-5">
        <div class="mt-5 row justify-content-center">
            <div class="col-md-4">
                <div class="card">
                    <h3 class="card-header text-center"> {{ isset($url) ? ucwords($url) : '' }} {{ __('Register') }}</h3>
                    <div class="card-body">
                        @if($url=='admin')
                            <form method="POST" action='{{ url("register/$url") }}' aria-label="{{ __('Register') }}">
                                @csrf
                                <div class="form-group mb-3">
                                    <input type="text" placeholder="Name" id="name" class="form-control" name="name" value="{{old('name')}}"
                                        autofocus>
                                    @if ($errors->has('name'))
                                    <span class="text-danger">{{ $errors->first('name') }}</span>
                                    @endif
                                </div>
                                <div class="form-group mb-3">
                                    <input type="text" placeholder="Email" id="email_address" class="form-control"
                                        name="email"  value="{{old('email')}}" autofocus>
                                    @if ($errors->has('email'))
                                    <span class="text-danger">{{ $errors->first('email') }}</span>
                                    @endif
                                </div>

                                <div class="form-group mb-3">
                                    <input type="password" placeholder="Password" id="password" class="form-control"
                                        name="password" >
                                    @if ($errors->has('password'))
                                    <span class="text-danger">{{ $errors->first('password') }}</span>
                                    @endif
                                </div>

                                <div class="form-group mb-3">
                                    <input type="password" placeholder="Confirm Password" id="cpassword" class="form-control"
                                        name="cpassword" >
                                    @if ($errors->has('cpassword'))
                                    <span class="text-danger">{{ $errors->first('cpassword') }}</span>
                                    @endif
                                </div>
                                <div class="d-grid mx-auto">
                                    <button type="submit" class="btn btn-dark btn-block">Sign up</button>
                                </div>
                            </form>
                        @elseif ($url=='student')
                            <form method="POST" action='{{ url("register/$url") }}' aria-label="{{ __('Register') }}">
                                @csrf
                                <div class="form-group mb-3">
                                    <input type="number" placeholder="Roll No" id="roll_no" class="form-control" name="roll_no" value="{{old('roll_no')}}"
                                        autofocus>
                                    @if ($errors->has('roll_no'))
                                    <span class="text-danger">{{ $errors->first('roll_no') }}</span>
                                    @endif
                                </div>

                                <div class="form-group mb-3">
                                    <input type="text" placeholder="Name" id="name" class="form-control" name="name" value="{{old('name')}}"
                                        autofocus>
                                    @if ($errors->has('name'))
                                    <span class="text-danger">{{ $errors->first('name') }}</span>
                                    @endif
                                </div>
                                <div class="form-group mb-3">
                                    <input type="number" placeholder="Standard" id="standard" class="form-control" name="standard" value="{{old('standard')}}"
                                        autofocus>
                                    @if ($errors->has('standard'))
                                        <span class="text-danger">{{ $errors->first('standard') }}</span>
                                    @endif
                                </div>
                                <div class="form-group mb-3">
                                    <input type="number" placeholder="Age" id="age" class="form-control" name="age" value="{{old('age')}}"
                                        autofocus>
                                    @if ($errors->has('age'))
                                        <span class="text-danger">{{ $errors->first('age') }}</span>
                                    @endif
                                </div>
                                <div class="form-group mb-3">
                                    <input type="text" placeholder="Email" id="email_address" class="form-control"
                                        name="email"  value="{{old('email')}}" autofocus>
                                    @if ($errors->has('email'))
                                    <span class="text-danger">{{ $errors->first('email') }}</span>
                                    @endif
                                </div>

                                <div class="form-group mb-3">
                                    <input type="password" placeholder="Password" id="password" class="form-control"
                                        name="password" >
                                    @if ($errors->has('password'))
                                    <span class="text-danger">{{ $errors->first('password') }}</span>
                                    @endif
                                </div>

                                <div class="form-group mb-3">
                                    <input type="password" placeholder="Confirm Password" id="cpassword" class="form-control"
                                        name="cpassword" >
                                    @if ($errors->has('cpassword'))
                                    <span class="text-danger">{{ $errors->first('cpassword') }}</span>
                                    @endif
                                </div>
                                <div class="d-grid mx-auto">
                                    <button type="submit" class="btn btn-dark btn-block">Sign up</button>
                                </div>
                            </form>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection
