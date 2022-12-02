{{-- <!DOCTYPE html>
<html>
<head>
    <title>Laravel Update User Status Using Toggle Button</title>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js" ></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css"  />
        <link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
        <script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>
</head>
<body>
    <div class="container">
        <h1>Laravel Update User Status Using Toggle Button Example - ItSolutionStuff.com</h1>
        <table class="table table-bordered">
            <thead>
               <tr>
                  <th>Name</th>
                  <th>Email</th>
                  <th>Status</th>
               </tr> 
            </thead>
            <tbody>
                @foreach ($allData as $key => $user)
                  <tr>
                     <td>{{ $user->name }}</td>
                     <td>{{ $user->email }}</td>
                     <td>
                        <input data-id="{{$user->id}}" class="toggle-class" type="checkbox" data-onstyle="success" data-offstyle="danger" data-toggle="toggle" data-on="Active" data-off="InActive" {{ $user->status ? 'checked' : '' }}>
                      
                     </td>
                  </tr>
               @endforeach
            </tbody>
        </table>
    </div>
</body>
<script>
  $(function() {
    $('.toggle-class').change(function() {
        var status = $(this).prop('checked') == true ? 1 : 0; 
        var user_id = $(this).data('id'); 
         
        $.ajax({
            type: "GET",
            dataType: "json",
            url: '/changeStatus',
            data: {'status': status, 'user_id': user_id},
            success: function(data)
            
            {
              console.log(data.success)
            }
        });
    })
  })
</script>
</html> --}}


{{-- @extends('admin.admin_master')
@section('admin') --}}

<head>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    {{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css" /> --}}
    <link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
    <script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>



    {{-- toast box --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
</head>


<div class="content-wrapper">
    <div class="container-full">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="d-flex align-items-center">
                <div class="mr-auto">
                    <a href="{{ route('home') }}">
                        <h3 class="page-title">User View</h3>
                    </a>
                    <div class="d-inline-block align-items-center">
                        <nav>
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="#"><i class="mdi mdi-home-outline"></i></a>
                                </li>
                                <li class="breadcrumb-item" aria-current="page">Users</li>
                                <li class="breadcrumb-item active" aria-current="page">User view</li>
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
                            <h3 class="box-title">User List</h3>
                            <a href="{{ route('admin.useradd') }}" style="float: right;"
                                class="btn btn-rounded btn-success mb-5">Add User</a>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="table-responsive">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th width="5%">SL</th>
                                            <th>Role</th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Status</th>
                                            <th width="20%">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($allData as $key => $user)
                                            <tr>
                                                <td>{{ $key + 1 }}</td>
                                                <td>{{ $user->usertype }}</td>
                                                <td>{{ $user->name }}</td>
                                                <td>{{ $user->email }}</td>

                                                <td>


                                                    <button class="myBtn" onclick="myFunction()">

                                                        <input data-id="{{ $user->id }}" class="toggle-class "
                                                            type="checkbox" data-onstyle="success"
                                                            data-offstyle="danger" data-toggle="toggle" data-on="Active"
                                                            data-off="InActive" {{ $user->status ? 'checked' : '' }}>
                                                       </button>
                                                   
                                                </td>
                                                

                                                <td>
                                                    <a href="{{ route('admin.useredit', $user->id) }}"
                                                        class="btn btn-info">Edit</a>
                                                    <a href="{{ route('admin.userdelete', $user->id) }}"
                                                        class="btn btn-danger" id="delete">Delete</a>
                                                </td>
                                            </tr>
                                        @endforeach

                                        <div class="toast hide" data-delay="1000" style="background-color: green">Status Is Change Successfully </div>

                                            

                                       



                            </div>


                            </tfoot>
                            <script type="text/javascript">
                                $(function() {
                                    $('.toggle-class').change(function() {
                                        var status = $(this).prop('checked') == true ? 1 : 0;
                                        var user_id = $(this).data('id');

                                        $.ajax({
                                            type: "GET",
                                            dataType: "json",
                                            url: '/changeStatus',
                                            data: {
                                                'status': status,
                                                'user_id': user_id
                                            },
                                            success: function(data) {
                                                console.log(data.success)
                                            }
                                        });
                                    })
                                })
                            </script>
                            <script>
                                $(document).ready(function() {
                                    $(".myBtn").click(function() {
                                        $('.toast').toast('show');
                                    });
                                });
                            </script>

                            <script>
                                function myFunction() {
                                    alert(" sure to Chnage Status ?");
                                }
                            </script>


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



{{-- @endsection --}}
