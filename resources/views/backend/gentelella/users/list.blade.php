@extends('backend.layouts.app')
@section('dependency-styles')
    <link href="cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
    <link href="{{asset('backend/vendors/datatables.net-bs/css/dataTables.bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('backend/vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('backend/vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css')}}"
          rel="stylesheet">
    <link href="{{asset('backend/vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css')}}"
          rel="stylesheet">
    <link href="{{asset('backend/vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css')}}"
          rel="stylesheet">
@endsection
@section('content')
    <!-- page content -->
    <div class="right_col" role="main">
        <div class="">
            <div class="page-title">
                <div class="title_left">
                    <h3>Users <small>Some examples to get you started</small></h3>
                </div>

            </div>

            <div class="clearfix"></div>

            <div class="row">
                <div class="col-md-12 col-sm-12 ">
                    <div class="x_panel">
                        <div class="x_title">
                            <h2>Default Example <small>Users</small></h2>
                            <ul class="nav navbar-right panel_toolbox">
                                <li>
                                    <a href="{{route('admin.users.create')}}" class="btn btn-success"><i class="fa fa-plus"></i></a>
                                </li>

                            </ul>
                            <div class="clearfix"></div>
                        </div>
                        <div class="x_content">
                            <div class="row">
                                <div class="col-sm-12">

                                    @include('backend.partials.success')

                                    <div class="card-box table-responsive">
                                        <table id="datatable" class="table table-striped table-bordered"
                                               style="width:100%">
                                            <thead>
                                            <tr>
                                                <th>Name</th>
                                                <th>Email</th>
                                                <th>Role</th>
                                                <th>Action</th>
                                            </tr>
                                            </thead>


                                            <tbody>
                                            @foreach($users as $user)
                                                <tr>
                                                    <td>{{$user->name}}</td>
                                                    <td>{{$user->email}}</td>
                                                    <td>{{$user->roles->pluck('name')->first()}}</td>


                                                    <td>
                                                        <div class="btn-group">
                                                            <a href="{{route('admin.users.edit',$user->id)}}"
                                                               class="btn btn-success" title="Edit"><i
                                                                    class="fa fa-edit"></i></a>
                                                            @if($user->roles->pluck('name')->first() != 'administrator')
                                                                <button class="btn btn-danger" onclick="deactive({{$user->id}})" title="Delete">
                                                                    <i class="fa fa-trash"></i>
                                                                </button>
                                                            @endif
                                                        </div>
                                                    </td>
                                                </tr>
                                            @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <!-- /page content -->

@endsection
@section('dependency-scripts')
    <script src="{{asset('backend/vendors/datatables.net/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('backend/vendors/datatables.net-bs/js/dataTables.bootstrap.min.js')}}"></script>
    <script src="{{asset('backend/vendors/datatables.net-buttons/js/dataTables.buttons.min.js')}}"></script>
    <script src="{{asset('backend/vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js')}}"></script>
    <script src="{{asset('backend/vendors/datatables.net-buttons/js/buttons.flash.min.js')}}"></script>
    <script src="{{asset('backend/vendors/datatables.net-buttons/js/buttons.html5.min.js')}}"></script>
    <script src="{{asset('backend/vendors/datatables.net-buttons/js/buttons.print.min.js')}}"></script>
    <script src="{{asset('backend/vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js')}}"></script>
    <script src="{{asset('backend/vendors/datatables.net-keytable/js/dataTables.keyTable.min.js')}}"></script>
    <script src="{{asset('backend/vendors/datatables.net-responsive/js/dataTables.responsive.min.js')}}"></script>
    <script src="{{asset('backend/vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js')}}"></script>
    <script src="{{asset('backend/vendors/datatables.net-scroller/js/dataTables.scroller.min.js')}}"></script>
    <script src="{{asset('backend/vendors/jszip/dist/jszip.min.js')}}"></script>
    <script src="{{asset('backend/vendors/pdfmake/build/pdfmake.min.js')}}"></script>
    <script src="{{asset('backend/vendors/pdfmake/build/vfs_fonts.js')}}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/8.11.8/sweetalert2.all.js"></script>

    <script>
        function deactive(id){
            swal.fire({
                title: "{{ trans('global.areYouSure') }}",
                text: "{{ trans('global.del_conformation') }}",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText:  "{{trans('global.ok_button')}}",
                confirmButtonColor: '#3085d6',
                cancelButtonText: "{{trans('global.cancel_button')}}",
                cancelButtonColor: '#d33',
            })
                .then((result) => {
                    if (result.value) {
                        $.ajax({
                            url : "{{ url('admin/roles') }}" + '/' + id,
                            type : "POST",
                            data : {'_method' : 'DELETE', _token: '{{csrf_token()}}'},
                            success : function(){
                                swal.fire({
                                    title : "{{trans('global.congratulation')}}",
                                    text : "{{trans('global.del_successful')}}",
                                    icon : "success",
                                }).then(function() {
                                    location.reload();
                                });
                            },
                            error : function(){
                                swal.fire({
                                    title : 'Opps...',
                                    text : 'Something wrong!',
                                    icon : 'error',
                                    timer : '1500'
                                });
                            },
                        })
                    }
                });
        }
    </script>
@endsection
