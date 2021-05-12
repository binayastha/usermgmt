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
                                <h3 class="card-title">Add User</h3>

                            </div>
                            <!-- /.card-header -->

                            <!-- form start -->
                            <form action="{{route('admin.user.store')}}" method="POST">
                                @csrf
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="name">Full Name <span class="required">*</span></label>

                                        <input type="text" class="form-control @if($errors->has('name'))is-invalid @endif" id="name" name="name"  placeholder="Full Name" value="{{ old('name') }}">
                                        @if($errors->has('name'))
                                            <span id="name-error" class="error invalid-feedback">{{ $errors->first('name') }}</span>
                                        @endif
                                    </div>

                                    <div class="form-group">
                                        <label for="email">Email <span class="required">*</span></label>

                                        <input type="text" class="form-control @if($errors->has('email'))is-invalid @endif" id="email" name="email"  placeholder="Email" value="{{ old('email') }}">
                                        @if($errors->has('email'))
                                            <span id="email-error" class="error invalid-feedback">{{ $errors->first('email') }}</span>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <label for="password">Password <span class="required">*</span></label>

                                        <input type="password" class="form-control @if($errors->has('password'))is-invalid @endif" id="password" name="password"  placeholder="Password">
                                        @if($errors->has('password'))
                                            <span id="password-error" class="error invalid-feedback">{{ $errors->first('password') }}</span>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <label for="password_confirmation">Password <span class="required">*</span></label>

                                        <input type="password" class="form-control @if($errors->has('password_confirmation'))is-invalid @endif" id="password_confirmation" name="password_confirmation"  placeholder="Password Confirmation">
                                        @if($errors->has('password_confirmation'))
                                            <span id="password_confirmation-error" class="error invalid-feedback">{{ $errors->first('password_confirmation') }}</span>
                                        @endif
                                    </div>


                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Role</label>

                                        <select class="form-control select2 @if($errors->has('role'))is-invalid @endif"  name="role"  style="width: 100%;">
                                            <option></option>
                                            @foreach($roles as $id => $role)
                                                <option value="{{ $id }}" {{ ( $id == old('role')) ? 'selected' : '' }}>{{ ucwords($role) }}</option>

                                            @endforeach
                                        </select>
                                        @if($errors->has('role'))
                                            <span id="role-error" class="error invalid-feedback">{{ $errors->first('role') }}</span>
                                        @endif

                                    </div>

                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Invite</label>

                                        <input type="checkbox" value="1" name="is_invited" checked data-bootstrap-switch data-off-color="danger" data-on-color="success">

                                    </div>
                                </div>
                                <!-- /.card-body -->

                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary">Save</button>
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
    <!-- Bootstrap Switch -->
    <script src="{{asset('backend/admin/plugins/bootstrap-switch/js/bootstrap-switch.min.js')}}"></script>
@endsection
@section('scripts')
    <script>
        $(document).ready(function () {

            $('.select2').select2({

                placeholder: 'Select Role',
            })

            $("input[data-bootstrap-switch]").each(function(){
                $(this).bootstrapSwitch('state', $(this).prop('checked'));
            });
        })

    </script>
@endsection
