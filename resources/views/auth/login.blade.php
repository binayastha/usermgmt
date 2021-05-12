@extends('auth.layouts.app')

@section('content')

    <div class="login-content">
        <form method="POST" action="{{ route('auth.login') }}" class="sign-in-form" autocomplete="off">
            @csrf
            <img src="{{asset('auth/img/avatar.svg')}}">
            <h2 class="title">Welcome</h2>
            <div class="input-div one ">
                <div class="i">
                    <i class="fas fa-user"></i>
                </div>
                <div class="div">
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                           name="email"
                           value="{{ old('email') }}" placeholder="Email">
                </div>
            </div>
            @error('email')
            <span class="invalid-feedback" role="alert">
                   <span>{{ $message }}</span>
                </span>
            @enderror

            <div class="input-div pass">
                <div class="i">
                    <i class="fas fa-lock"></i>
                </div>
                <div class="div">
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror"
                           name="password" placeholder="Password">
                </div>
            </div>

            @error('password')
            <span class="invalid-feedback" role="alert">
                    <span>{{ $message }}</span>
                </span>
            @enderror
            <a href="{{route('password.request')}}">Forgot Password?</a>
            <a href="{{route('register')}}">New Here?</a>
            <input type="submit" class="btn" value="Login">
        </form>
    </div>
@endsection
