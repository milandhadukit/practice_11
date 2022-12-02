{{-- @extends('layouts.app')

@section('content') --}}

@extends('admin.admin_master')
@section('admin')


{{-- <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                {{-- <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div> 
            </div>
        </div>
    </div>
</div>
@endsection --}}


<div class="content-wrapper">
    <div class="container-full">

        <!-- Main content -->
        <section class="content">
            <div class="row">



                 @if(Auth::user()->usertype=='Admin') 
               <div class="col-xl-3 col-6">
                    <div class="box overflow-hidden pull-up">
                        <div class="box-body">
                            <div class="icon bg-primary-light rounded w-60 h-60">
                                <i class="text-primary mr-0 font-size-24 mdi mdi-account-multiple"></i>
                            </div>
                            <div>

                               <p><a href="" class="text-mute mt-20 mb-0 font-size-18">HELLOW</a></p>
                                <h3 class="text-white mb-0 font-weight-500"> <small class="text-success">
                                    <i class="fa fa-delicious" style="font-size:18px;color:red"></i>
                                 </small>

                                </h3>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-3 col-6">
                    <div class="box overflow-hidden pull-up">
                        <div class="box-body">
                            <div class="icon bg-primary-light rounded w-60 h-60">
                                <i class="text-primary mr-0 font-size-24 mdi mdi-account-multiple"></i>
                            </div>
                            <div>
                                <p>
                                <a href="" class="text-mute mt-20 mb-0 font-size-18">Welcome</a></p>
                                <h3 class="text-white mb-0 font-weight-500"> <small class="text-success">
                                    <i class="fa fa-user-md" style="font-size:18px;color:red"></i>


                                </small>

                                </h3>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-3 col-6">
                    <div class="box overflow-hidden pull-up">
                        <div class="box-body">
                            <div  class="icon bg-primary-light rounded w-60 h-60">
                                <i class="text-primary mr-0 font-size-24 mdi mdi-account-multiple"></i>
                            </div>
                            <div>
                                <p>
                                <a href="" class="text-mute mt-20 mb-0 font-size-18">WeLcOmE</a></p>
                                <h3 class="text-white mb-0 font-weight-500"> <small class="text-success">
                                    <i class="fa fa-comment" aria-hidden="true" style="font-size:18px;color:red"></i>


                                </small>

                                </h3>
                            </div>
                        </div>
                    </div>
                </div> 


                @endif
            </div>


        </section>
        {{-- @if(Auth::user()->usertype=='user')
        <h1 style="text-align: center"><i>WELCOME</i></h1>
        @endif --}}
        <!-- /.content -->
    </div>
</div>

@endsection
