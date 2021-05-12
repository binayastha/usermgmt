<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <script
        src="https://kit.fontawesome.com/64d58efce2.js"
        crossorigin="anonymous"
    ></script>
    <link rel="stylesheet" href="{{asset('auth/css/style.css')}}"/>
    <title>{{ config('app.name', 'Laravel') }}</title>
    <!-- Toastr -->
    <link rel="stylesheet" href="{{asset('backend/admin/plugins/toastr/toastr.min.css')}}">
</head>
<body>

@yield('content')

<!-- jQuery -->
<script src="{{asset('backend/admin/plugins/jquery/jquery.min.js')}}"></script>

<script src="{{asset('backend/admin/plugins/toastr/toastr.min.js')}}"></script>
<script src="{{asset('auth/js/login.js')}}"></script>
@include('backend.partials.success')
</body>
</html>
