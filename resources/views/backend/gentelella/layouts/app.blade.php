@include('backend.partials.header')
<div class="container body">
    <div class="main_container">
        @include('backend.partials.sidenav')

        @yield('content')

<!-- jQuery -->
@include('backend.partials.footer')
