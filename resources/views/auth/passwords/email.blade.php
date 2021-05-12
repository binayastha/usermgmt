@extends('auth.layouts.app')

@section('content')
    <div class="login-content">
        <form method="POST" action="{{ route('password.email') }}">
            @csrf
            <img src="{{asset('auth/img/avatar.svg')}}">
            <h3 class="title">Reset Password</h3>

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

            <a href="{{route('auth.login')}}">Returning?</a>
            <input type="submit" class="btn" value="Login">
        </form>
    </div>
@endsection
