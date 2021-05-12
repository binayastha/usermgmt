@extends('auth.layouts.app')

@section('content')
    <div class="login-content">
        <form method="POST" action="{{ route('password.update') }}">
            @csrf
            <img src="{{asset('auth/img/avatar.svg')}}">
            <h3 class="title">Reset Password</h3>

            <input type="hidden" name="token" value="{{ $token }}">
            <div class="input-div one">
                <div class="i">
                    <i class="fas fa-envelope"></i>
                </div>
                <div class="div">
                    <input id="email" type="email" class="input @error('email') is-invalid @enderror" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>

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
                    <input id="password" type="password" class="input @error('password') is-invalid @enderror" name="password" value="" placeholder="New Password">

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
                    <input id="password-confirm" type="password" class="input " name="password_confirmation" value="" placeholder="Confirm Password">

                </div>
            </div>

            <a href="{{route('auth.login')}}">Returning?</a>
            <input type="submit" class="btn" value="Login">
        </form>
    </div>
@endsection
