@extends('admin.admin_master')
@section('admin')
    <div class="content-wrapper">
        <div class="container-full">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="d-flex align-items-center">
                    <div class="mr-auto">
                        <h3 class="page-title">User Role View</h3>
                        <div class="d-inline-block align-items-center">
                            <nav>
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="#"><i class="mdi mdi-home-outline"></i></a></li>
                                    <li class="breadcrumb-item" aria-current="page">Users Role</li>
                                    <li class="breadcrumb-item active" aria-current="page">User Role view</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Main content -->
            <section class="content">
                <div class="row">
                    <div class="col-12">
                        <div class="box">
                            <div class="box-header with-border">
                                <h3 class="box-title">User Role list</h3>
                                <a href="{{ route('admin.useradd') }}" style="float: right;" class="btn btn-rounded btn-success mb-5">Add User</a>
                            </div>
                            <!-- /.box-header -->
                            <div class="box-body">
                                <div class="table-responsive">
                                    <table id="example1" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th width="5%">No</th>
                                                <th>Name</th>
                                                <th>Role</th>
                                                                                
                                                {{-- <th width="20%">Action</th> --}}
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($usershow as  $user)
                                            <tr>
                                               
                                                <td>{{ $user->id }}</td>
                                                <td>{{ $user->name }}</td>

                                                @foreach ($user->roles as $role)
                                                <td >{{ $role->name }}</td>
                                                @endforeach
                                               
                                             {{-- <td> --}}
                                                    {{-- <a href="{{ route('admin.useredit',$user->id) }}" class="btn btn-info">Edit</a> --}}
                                                    {{-- <a href="{{ route('admin.userdelete',$user->id) }}" class="btn btn-danger" id="delete">Delete</a> --}}
                                                {{-- </td>  --}}
                                            </tr>
                                            @endforeach
                                        </tfoot>
                                    </table>
                                </div>
                            </div>
                            <!-- /.box-body -->
                        </div>
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
            </section>
            <!-- /.content -->
        </div>
    </div>
@endsection