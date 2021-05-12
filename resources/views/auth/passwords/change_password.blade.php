@extends('auth.layouts.app')

@section('content')
    <div class="login-content">
        <form method="POST" action="{{ route('auth.afterverifychangepassword') }}" class="sign-in-form" autocomplete="off">
            @csrf
            <img src="{{asset('auth/img/avatar.svg')}}">
            <h2 class="title">Change Password</h2>




            <div class="input-div pass">
                <div class="i">
                    <i class="fas fa-lock"></i>
                </div>
                <div class="div">
                    <input id="password" type="password" class="input @error('password') is-invalid @enderror" name="password" value="" placeholder="Password">
                </div>
            </div>
            @error('password')
            <span class="invalid-feedback" role="alert">
                <span>{{ $message }}</span>
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

            <input type="submit" class="btn" value="Login">
        </form>
    </div>
@endsection
