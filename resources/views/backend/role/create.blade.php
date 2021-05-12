@extends('backend.layouts.app')
@section('dependency-styles')
<!-- Select2 -->
<link rel="stylesheet" href="{{asset('backend/admin/plugins/select2/css/select2.min.css')}}">
<link rel="stylesheet" href="{{asset('backend/admin/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css')}}">
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
                                <h3 class="card-title">Add Role</h3>

                            </div>
                            <!-- /.card-header -->

                                <!-- form start -->
                                <form action="{{route('admin.roles.store')}}" method="POST">
                                    @csrf
                                    <div class="card-body">
                                        <div class="form-group">
                                            <label for="rolename">Role Name <span class="required">*</span></label>

                                            <input type="text" class="form-control @if($errors->has('name'))is-invalid @endif" id="rolename" name="name"  placeholder="Role Name">
                                            @if($errors->has('name'))
                                                <span id="exampleInputEmail1-error" class="error invalid-feedback">{{ $errors->first('name') }}</span>
                                            @endif
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputPassword1">Permissions</label>

                                            <select class="form-control select2"  name="permission[]" multiple="multiple" style="width: 100%;">
                                                <option></option>
                                                @foreach($permissions as $id => $permission)
                                                    <option value="{{ $id }}" {{ (in_array($id, old('permission', [])) ) ? 'selected' : '' }}>{{ $permission }}</option>
                                                @endforeach
                                            </select>

                                        </div>
                                    </div>
                                    <!-- /.card-body -->

                                    <div class="card-footer">
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                    </div>
                                </form>

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
    <!-- Select2 -->
    <script src="{{asset('backend/admin/plugins/select2/js/select2.full.min.js')}}"></script>
@endsection
@section('scripts')
    <script>
        $(document).ready(function () {

            $('.select2').select2({

                placeholder: 'Select Permission',
            })
        })

    </script>
@endsection
