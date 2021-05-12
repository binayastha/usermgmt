<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
          href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="{{asset('backend/admin/plugins/fontawesome-free/css/all.min.css')}}">
    <!-- overlayScrollbars -->
    <!-- Theme style -->

    @yield('dependency-styles')

<!-- Toastr -->
    <link rel="stylesheet" href="{{asset('backend/admin/plugins/toastr/toastr.min.css')}}">

    <link rel="stylesheet" href="{{asset('backend/admin/dist/css/adminlte.min.css')}}">
    <link rel="stylesheet" href="{{asset('backend/admin/dist/css/custom.css')}}">
</head>

<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
<div class="wrapper">
