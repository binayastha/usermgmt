@extends('backend.layouts.app')

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
                                <h3 class="card-title">{{$user->name}}</h3>
                                <div class="card-tools">
                                    <a href="{{route('admin.user.edit',$user->id)}}" class="btn btn-success" title="Edit User">
                                        <i class="fas fa-edit"></i>
                                    </a>

                                </div>
                            </div>
                            <!-- /.card-header -->

                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-hover">

                                        <tr>
                                            <th>Name</th>
                                            <td>{{ $user->name }}</td>
                                        </tr>

                                        <tr>
                                            <th>Email</th>
                                            <td>{{ $user->email }}</td>
                                        </tr>

                                        <tr>
                                            <th>Role</th>
                                            <td>{{ $user->roles->pluck('name')->first() }}</td>
                                        </tr>

                                        <tr>
                                            <th>Mode of Registration </th>
                                            <td>
                                                @if($user->is_registered)
                                                    <span class="badge badge-success" title="Verified">Self Registered</span>
                                                @elseif($user->is_invited == 1)
                                                    <span class="badge badge-success" title="Verified">Invited</span>
                                                @else
                                                    <span class="badge badge-danger" title="Un Verified">Not Invited Yet</span>
                                                @endif
                                            </td>
                                        </tr>
                                        @if($user->is_registered || $user->is_invited == 1)
                                            <tr>
                                                <th>Status</th>
                                                <td>
                                                    @if($user->hasVerifiedEmail())
                                                        <span class="badge badge-info" title="Verified"><i class="fas fa-check-circle"></i></span>
                                                    @else
                                                        <span class="badge badge-danger" title="Un Verified"><i class="fas fa-times-circle"></i></span>
                                                    @endif
                                                </td>
                                            </tr>
                                        @endif



                                        <tr>
                                            <th>Last Logged In</th>
                                            <td>
                                                @if($user->last_login_at)
                                                    {{$user->last_login_at }}
                                                    ({{
                                                        Carbon\Carbon::parse($user->last_login_at)->diffForHumans()
                                                    }})

                                                @else
                                                    N/A
                                                @endif
                                            </td>
                                        </tr>

                                        <tr>
                                            <th>Last Logged In Ip</th>
                                            <td>{{ $user->last_login_ip ?? 'N/A' }}</td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                            <!-- /.card-body -->

                            <div class="card-footer">
                                <div class="row">
                                    <div class="col">
                                        <small class="float-right text-muted">
                                            <strong>Created At:</strong> ({{ $user->created_at->diffForHumans() }}),
                                            <strong>Last Updated At:</strong> ({{ $user->updated_at->diffForHumans() }})

                                        </small>
                                    </div><!--col-->
                                </div><!--row-->
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
