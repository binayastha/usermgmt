@if(session('message'))
    <script>
        toastr.success("{{session('message')}}")
    </script>
@endif

@if(session('error'))
    <script>
        toastr.error("{{session('error')}}")
    </script>
@endif

@if(session('status'))
    <script>
        toastr.success("{{session('status')}}")
    </script>
@endif
