@extends('admin.admin_master')
@section('admin')
    <html>

    <head>

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
      <!-- jquery -->
      <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
 
      <!-- Price nouislider-filter cdn -->
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/noUiSlider/15.5.1/nouislider.css" integrity="sha512-MKxcSu/LDtbIYHBNAWUQwfB3iVoG9xeMCm32QV5hZ/9lFaQZJVaXfz9aFa0IZExWzCpm7OWvp9zq9gVip/nLMg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
      <script src="https://cdnjs.cloudflare.com/ajax/libs/noUiSlider/15.5.1/nouislider.min.js" integrity="sha512-T5Bneq9hePRO8JR0S/0lQ7gdW+ceLThvC80UjwkMRz+8q+4DARVZ4dqKoyENC7FcYresjfJ6ubaOgIE35irf4w==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
      <style>
        .mall-slider-handles{
        margin-top: 50px;
        }
        .filter-container-1{
        display: flex;
        justify-content: center;
        margin-top: 60px;
        }
        .filter-container-1 input{
        border: 1px solid #ddd;
        width: 100%;
        text-align: center;
        height: 30px;
        border-radius: 5px;
        }
        .filter-container-1 button{
        background: #51a179;
        color:#fff;
        padding: 5px 20px;
        }
        .filter-container-1 button:hover{
        background: #2e7552;
        color:#fff;
        }
         
     </style>

    </head>
    <body>
    <div class="content-wrapper">
        <div class="container-full">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="d-flex align-items-center">
                    <div class="mr-auto">
                        <h3 class="page-title"> Product list</h3>
                        <div class="d-inline-block align-items-center">
                            <nav>
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="#"><i class="mdi mdi-home-outline"></i></a>
                                    </li>
                                    <li class="breadcrumb-item" aria-current="page">Price Filter</li>

                                    <div class="container mt-3">
                                       


                                        <!-- filter by price start -->
            <div class="widget mercado-widget filter-widget price-filter">
                <h5 class="widget-title">Filter By Price</h5>
                <form action="{{ route('admin.product-list') }}" method="GET">
                    @csrf
                   <div class="mall-property">
                      <div class="mall-property__label">
                        
                         <a class="mall-property__clear-filter js-mall-clear-filter" href="javascript:;" data-filter="price" style="">
                         </a> 
                      </div>
                      <div class="mall-slider-handles" data-start="{{ $filter_min_price ?? $min_price }}" data-end="{{ $filter_max_price ?? $max_price }}" data-min="{{ $min_price}}" data-max="{{ $max_price }}" data-target="price" style="width: 30%">
                      </div>
                      <div class="row filter-container-1">
                         <div class="col-md-4">
                            <input data-min="price" id="skip-value-lower" name="min_price" value="{{ $filter_min_price ?? $min_price }}" readonly>  
                         </div>
                         <div class="col-md-4">
                            <input data-max="price" id="skip-value-upper" name="max_price" value="{{ $filter_max_price ?? $max_price }}" readonly>
                         </div>
                         <div class="col-md-4">
                            <button type="submit" class="btn btn-sm">Filter</button>
                         </div>
                      </div>
                   </div>
                </form>
             </div>
             <!-- filter by price end -->
                                    </div>

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
                                <h3 class="box-title">Product list</h3>
                                {{-- <a href="" style="float: right;" class="btn btn-rounded btn-success mb-5">Add Complain</a> --}}
                            </div>
                            <!-- /.box-header -->
                            <div class="box-body">
                                <div class="table-responsive">
                                    <table id="example1" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>


                                                <th>Name</th>
                                                <th>thumb Image</th>
                                                <th>cover Image</th>
                                                <th>Price</th>
                                                {{-- <th>Category List</th> --}}
                                                <th width="20%">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody id="tbody">
                                            @if (count($categories) > 0)
                                                @foreach ($productList as $list)
                                                    <tr>

                                                        <td>{{ $list->product_name }}</td>
                                                        <td width="20%"><img
                                                                src="{{ asset('thumb_image/' . $list->thumb_image) }}"
                                                                width="20%" height="20%" alt=""></td>
                                                        <td width="20%"><img
                                                                src="{{ asset('Cover_Images/' . $list->cover_image) }}"
                                                                width="30%" height="30%" alt=""></td>
                                                        <td>{{ $list->price }}</td>


                                                        <td>
                                                            {{-- <a href="{{ route('fuser.fdelete',$user->id) }}" class="btn btn-danger" id="delete">Delete</a> --}}
                                                           
                                                            <a href="{{ route('product.add-cart',$list->id) }}" class="btn btn-outline-light">Add To Cart</a>
                                                            
                                                       
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            @endif
                                            <div class="container mt-3">

                                                <div class="form-check">
                                                    <label>filter Category</label><br>
                                                    <select name="category" id="category">

                                                        <option value="">Select Category</option>
                                                        @if (count($categories) > 0)
                                                            @foreach ($categories as $c)
                                                                <option value="{{ $c['id'] }}">{{ $c->category_name }}
                                                                </option>
                                                            @endforeach
                                                        @endif
                                                    </select>
                                                </div>
                                                </tfoot>
                                    </table>
                                    <script>
                                        $(document).ready(function() {
                                            $("#category").on('change', function() {
                                                var category = $(this).val();
                                                $.ajax({
                                                    url: "{{ route('admin.product-list') }}",
                                                    type: "GET",
                                                    data: {
                                                        'category':category
                                                    },
                                                    success: function(data) {
                                                        // console.log(data);
                                                         var productList = data.productList;
                                                         var html = '';

                                                         console.log(productList.length);
                                                         if (productList.length > 0) {
                                                            for (let i = 0;i<productList.length; i++) {
                                                                html = html +'<tr><td>'+productList[i]['product_name']+'</td><td>'+productList[i]['thumb_image']+'</td><td>'+productList[i]['price']+'</td></tr>';     
                                                            }
                                                         }
                                                         
                                                        
                                                        $("#tbody").html(html);

                                                    }


                                                });
                                            });

                                        });
                                    </script>

<script>
    $(function () {
            var $propertiesForm = $('.mall-category-filter');
            var $body = $('body');
            $('.mall-slider-handles').each(function () {
                var el = this;
                noUiSlider.create(el, {
                    start: [el.dataset.start, el.dataset.end],
                    connect: true,
                    tooltips: true,
                    range: {
                        min: [parseFloat(el.dataset.min)],
                        max: [parseFloat(el.dataset.max)]
                    },
                    pips: {
                        mode: 'range',
                        density: 20,
                    }
                }).on('change', function (values) {
                    $('[data-min="' + el.dataset.target + '"]').val(values[0])
                    $('[data-max="' + el.dataset.target + '"]').val(values[1])
                    $propertiesForm.trigger('submit');
                   
                });
            })
        })     
 </script>
    
                                </div>
                            </div>
                            <!-- /.box-body -->
                            
                        </div>
                    </div>
                    
                    <!-- /.col -->
                </div>
                <!-- /.row -->
                <div class="row">
                    <div class="col-lg-4 col-sm-4 col-4 text-center checkout">
                        <a href="{{ route('cart') }}" class="btn btn-warning btn-block"> Cart View </a>
                    </div>
            </section>
            <!-- /.content -->
        </div>
    </div>
   
</body>

    </html>
@endsection
