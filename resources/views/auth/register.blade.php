@extends('auth.layouts.app')

@section('content')
    <div class="login-content">
        <form action="{{ route('register') }}" class="sign-up-form" method="POST">
            @csrf
            <img src="{{asset('auth/img/avatar.svg')}}">
            <h2 class="title">New Here?</h2>
            <div class="input-div one">
                <div class="i">
                    <i class="fas fa-user"></i>
                </div>
                <div class="div">
                    <input id="name" type="text" class="input @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" placeholder="Name">
                </div>
            </div>
            @error('name')
            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
            @enderror

            <div class="input-div one">
                <div class="i">
                    <i class="fas fa-envelope"></i>
                </div>
                <div class="div">
                    <input id="email" type="email" class="input @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" placeholder="Email">
                </div>
            </div>
            @error('email')
            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
            @enderror

            <div class="input-div pass">
                <div class="i">
                    <i class="fas fa-lock"></i>
                </div>
                <div class="div">
                    <input id="password" type="password" class="input @error('email') is-invalid @enderror" name="password" value="" placeholder="Password">
                </div>
            </div>
            @error('password')
            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
            @enderror

            <div class="input-div pass">
                <div class="i">
                    <i class="fas fa-lock"></i>
                </div>
                <div class="div">
                    <input id="password" type="password" class="input" name="password_confirmation" value="" placeholder="Confirm Password">
                </div>
            </div>
            <a href="{{route('password.request')}}">Forgot Password?</a>
            <a href="{{route('auth.login')}}">Returning?</a>
            <input type="submit" class="btn" value="Login">
        </form>
    </div>
@endsection
