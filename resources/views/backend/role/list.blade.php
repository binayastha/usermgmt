@extends('backend.layouts.app')
@section('dependency-styles')
    <link rel="stylesheet" href="{{asset('backend/admin/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
    <link rel="stylesheet" href="{{asset('backend/admin/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
    <link rel="stylesheet" href="{{asset('backend/admin/plugins/datatables-buttons/css/buttons.bootstrap4.min.css')}}">

    <!-- SweetAlert2 -->
    <link rel="stylesheet" href="{{asset('backend/admin/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css')}}">

@endsection
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
    @include('backend.partials.breadcrumb')

    <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Roles</h3>

                                <div class="card-tools">
                                    <a href="{{route('admin.roles.create')}}" class="btn btn-success" title="Add New Roles">
                                        <i class="fas fa-plus"></i>
                                    </a>

                                </div>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">

                                <table id="example2" class="table table-bordered table-hover">
                                    <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Permissions</th>
                                        <th>Number of Users</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($roles as $role)
                                        <tr>
                                            <td>{{$role->name}}</td>
                                            <td>
                                                @foreach($role->permissions as $permission)
                                                    <span class="badge badge-info">
                                                                {{$permission->name}}
                                                                </span>
                                                @endforeach
                                            </td>
                                            <td>
                                                {{ $role->users->count() }}
                                            </td>
                                            <td>
                                                <div class="btn-group">
                                                    <a href="{{route('admin.roles.edit',$role->id)}}"
                                                       class="btn btn-success" title="Edit"><i
                                                            class="fa fa-edit"></i></a>
                                                    @if($role->name != 'administrator')
                                                        <button class="btn btn-danger" onclick="deactive({{$role->id}})" title="Delete">
                                                            <i class="fa fa-trash"></i>
                                                        </button>
                                                    @endif
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                    <tfoot>
                                    <tr>
                                        <th>Name</th>
                                        <th>Permissions</th>
                                        <th>Number of Users</th>
                                        <th>Action</th>
                                    </tr>
                                    </tfoot>
                                </table>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->

                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

@endsection


@section('dependency-scripts')
    <!-- DataTables  & Plugins -->
    <script src="{{asset('backend/admin/plugins/datatables/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('backend/admin/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
    <script src="{{asset('backend/admin/plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
    <script src="{{asset('backend/admin/plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>

    <!-- SweetAlert2 -->
    <script src="{{asset('backend/admin/plugins/sweetalert2/sweetalert2.min.js')}}"></script>

@endsection

@section('scripts')
    <script>
        $(function () {
            $('#example2').DataTable({
                "paging": true,
                "lengthChange": false,
                "searching": true,
                "ordering": false,
                "info": true,
                "autoWidth": false,
                "responsive": true,
            });
        });

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
