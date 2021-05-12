@extends('auth.layouts.app')

@section('content')
    <style>
        .invalid-feedback{
            display: block;
            width: 320px;
            font-size: 12px;
            color: #e3342f;
            margin: 0px 10px;
            text-align: center;
        }
        .formerror{border-color: #e3342f}
    </style>
    <div class="container">
        <div class="forms-container">
            <div class="signin-signup">
                @include('auth.partial.changePasswordForm')
            </div>
        </div>
    </div>

    <div class="panels-container">
        <div class="panel left-panel">
            <div class="content">

            </div>
            <img src="{{asset('auth/img/log.svg')}}" class="image" alt="" />
        </div>
    </div>
@endsection
