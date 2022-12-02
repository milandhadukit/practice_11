@extends('user.user_master')
@section('user')
    <div class="content-wrapper">
        <div class="container-full">

            <div class="content-header">
                <div class="d-flex align-items-center">
                    <div class="mr-auto">
                        <h3 class="page-title">View</h3>
                        <div class="d-inline-block align-items-center">
                            <nav>
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="#"><i class="mdi mdi-home-outline"></i></a>
                                    </li>
                                    <li class="breadcrumb-item" aria-current="page">View</li>

                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
            <section class="content">


                <div class="container">
                    <div class="row">
                        <div class="col-12 table-responsive">



                            <div id="DataTables_Table_0_filter" class="dataTables_filter">
                                <label>Search:
                                    <input type="text" name="gender" class="form-control searchEmail"
                                        placeholder="Search for Gender Only...">
                                </label>
                            </div>



                            <div id="DataTables_Table_0_filter" class="dataTables_filter">
                                <label>Search:
                                    <input type="text" name="gender" class="form-control searchEmail" placeholder="Search for Gender Only...">
                                        
                                </label>
                            </div>


                        </div>
                       
                        <table class="table table-bordered data-table">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Gender</th>


                                    {{-- <th width="100px">Action</th> --}}
                                </tr>
                            </thead>
                            <tbody></tbody>
                        </table>
                    </div>
                </div>
        </div>

        <script type="text/javascript">
            $(function() {

                var table = $('.data-table').DataTable({
                    processing: true,
                    serverSide: true,
                    ajax: {
                        url: "{{ route('user.viewdata') }}",
                        data: function(d) {
                            d.gender = $('.searchEmail').val(),
                                d.search = $('input[type="search"]').val()
                        }
                    },
                    columns: [
                       
                        {
                            data: 'id',
                            name: 'id'
                        },
                        {
                            data: 'name',
                            name: 'name'
                        },
                        {
                            data: 'email',
                            name: 'email'
                        },
                        {
                            data: 'gender',
                            name: 'gender'
                        },

                        // {
                        //     data: 'action',
                        //     name: 'action',
                        //     orderable: false,
                        //     searchable: false
                        // },
                    ]
                });

                $(".searchEmail").keyup(function() {
                    table.draw();
                });

            });
        </script>



        </section>
    @endsection
