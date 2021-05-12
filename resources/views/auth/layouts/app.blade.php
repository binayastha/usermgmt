<!DOCTYPE html>
<html>
<head>
    <title>{{ config('app.name', 'Laravel') }}</title>
    <link rel="stylesheet" type="text/css" href="{{asset('auth/css/style.css')}}">
    <link href="https://fonts.googleapis.com/css?family=Poppins:600&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/a81368914c.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Toastr -->
    <link rel="stylesheet" href="{{asset('backend/admin/plugins/toastr/toastr.min.css')}}">
    <style>
        .invalid-feedback {
            display: block;
            width: 320px;
            font-size: 12px;
            color: #e3342f;
            margin: 0px 10px;
            text-align: center;
        }
    </style>
</head>
<body>
<img class="wave" src="{{asset("auth/img/wave.png")}}">
<div class="container">
    <div class="img">
        <img src="{{asset("auth/img/bg.svg")}}">
    </div>
    @yield('content')
</div>

<!-- jQuery -->
<script src="{{asset('backend/admin/plugins/jquery/jquery.min.js')}}"></script>

<script src="{{asset('backend/admin/plugins/toastr/toastr.min.js')}}"></script>
<script type="text/javascript" src="{{asset('auth/js/main.js')}}"></script>
@include('backend.partials.success')
</body>
</html>
