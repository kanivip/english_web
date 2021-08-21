@extends('admin.layout')
@section('content')

<div class="dashboard-ecommerce">
    <div class="container-fluid dashboard-content ">
        <select id="select-chart-user" class="custom-select col-3 float-right">
            @foreach($users as $user)
            <option value="{{$user->year}}" {{$user->year == now()->year ? 'selected' : ''}}>{{$user->year}}</option>
            @endforeach
        </select>
        <!-- ============================================================== -->
        <!-- pageheader  -->
        <!-- ============================================================== -->
        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="page-header">
                    <h2 class="pageheader-title">Return of User</h2>
                </div>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- end pageheader  -->
        <!-- ============================================================== -->
        <div class="ecommerce-widget">


            <div class="row">

                <!-- ============================================================== -->

                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                    <div class="card">
                        <h5 class="card-header">Return of New Users</h5>
                        <div class="card-body">
                            <div id="chart-user"></div>
                        </div>

                    </div>
                </div>
            </div>


        </div>
    </div>
    @endsection
