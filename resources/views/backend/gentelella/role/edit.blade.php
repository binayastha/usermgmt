@extends('backend.layouts.app')
@section('dependency-styles')
    <link href="{{asset('backend/vendors/select2/dist/css/select2.min.css')}}" rel="stylesheet">
@endsection
@section('content')
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

                            <div class="clearfix"></div>
                        </div>
                        <div class="x_content">
                            <div class="row">
                                <div class="col-sm-12">
                                    <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" action="{{route('admin.roles.update',[$role->id])}}" method="POST">
                                        @csrf
                                        @method('PUT')
                                        <div class="item form-group">
                                            <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Role Name <span class="required">*</span>
                                            </label>
                                            <div class="col-md-6 col-sm-6 ">
                                                <input type="text" id="name" name="name"
                                                       class="form-control @if($errors->has('name'))parsley-error @endif"
                                                       placeholder="Role Name"
                                                       value="{{ old('name', isset($role) ? $role->name : '') }}">
                                                @if($errors->has('name'))
                                                    <ul class="parsley-errors-list filled" id="parsley-id-20">
                                                        <li class="parsley-required">{{ $errors->first('name') }}</li>
                                                    </ul>

                                                @endif
                                            </div>
                                        </div>
                                        <div class="item form-group">
                                            <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Permissions<span class="required">*</span>
                                            </label>
                                            <div class="col-md-6 col-sm-6 ">

                                                <select class="select2_single form-control"  name="permission[]" multiple="multiple" tabindex="-1">
                                                    <option></option>
                                                    @foreach($permissions as $id => $permission)
                                                        <option value="{{ $id }}" {{ (in_array($id, old('permissions', [])) || isset($role) && $role->permissions()->pluck('name', 'id')->contains($id)) ? 'selected' : '' }}>{{ $permission }}</option>
                                                    @endforeach

                                                </select>

                                            </div>
                                        </div>



                                        <div class="ln_solid"></div>
                                        <div class="item form-group">
                                            <div class="col-md-6 col-sm-6 offset-md-3">
                                                <button type="submit" class="btn btn-success">Submit</button>
                                            </div>
                                        </div>

                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection

@section('dependency-scripts')
    <script src="{{asset('backend/vendors/select2/dist/js/select2.full.min.js')}}"></script>

    <script>
        $(document).ready(function () {

            $('.select2_single').select2({

                placeholder: 'Select Permission',
            })
        })

    </script>
@endsection
