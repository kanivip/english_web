@extends('admin.layout')
@section('content')
<div class="dashboard-ecommerce">
    <div class="container-fluid dashboard-content ">
        <!-- ============================================================== -->
        <!-- pageheader  -->
        <!-- ============================================================== -->
        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="page-header">
                    <h2 class="pageheader-title">Admin users</h2>
                    <p class="pageheader-text">Nulla euismod urna eros, sit amet scelerisque torton lectus
                        vel mauris facilisis faucibus at enim quis massa lobortis rutrum.</p>
                </div>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- end pageheader  -->
        <!-- ============================================================== -->
        <div class="ecommerce-widget">


            <!-- basic form  -->
            <!-- ============================================================== -->
            <div class="row">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                    <div class="card">
                        <h5 class="card-header">Banned</h5>
                        <div class="card-body">
                            <form method="get" action="{{route('admin.users.upgradeVip',$user->id)}}"
                                enctype="multipart/form-data">
                                @csrf

                                <div class="form-group">
                                    <label for="inputText3" class="col-form-label">Id</label>
                                    <input id="inputText3" value="{{old('id',$user->id)}}" name="id"
                                        type="text" class="form-control @error('id') is-invalid @enderror" disabled>
                                </div>

                                <div class="form-group">
                                    <label for="inputText3" class="col-form-label">Email</label>
                                    <input id="inputText3" value="{{old('email',$user->email)}}"
                                        name="email" type="text"
                                        class="form-control @error('email') is-invalid @enderror" disabled>
                                </div>
                                
                                <div class="form-group">
                                    <label for="inputText3" class="col-form-label">First Name</label>
                                    <input id="inputText3" value="{{old('first_name',$user->first_name)}}" name="first_name"
                                        type="text" class="form-control @error('first_name') is-invalid @enderror" disabled>
                                </div>

                                <div class="form-group">
                                    <label for="inputText3" class="col-form-label">Last Name</label>
                                    <input id="inputText3" value="{{old('last_name',$user->last_name)}}"
                                        name="last_name" type="text"
                                        class="form-control @error('last_name') is-invalid @enderror" disabled>
                                </div>

                                <div class="form-group">
                                    <label for="inputText3" class="col-form-label">Address</label>
                                    <input id="inputText3" value="{{old('address',$user->address)}}"
                                        name="address" type="text"
                                        class="form-control @error('address') is-invalid @enderror" disabled>
                                </div>

                                <div class="form-group">
                                    <label for="inputText3" class="col-form-label">Phone</label>
                                    <input id="inputText3" value="{{old('phone',$user->phone)}}"
                                        name="phone" type="number"
                                        class="form-control @error('phone') is-invalid @enderror" disabled>
                                </div>
                                Upgrade Vip
                                <br>
                                <span>  
                                    <select name="vip_day" class="custom-select">
                                        <option value="+7 day"> 7 Days </option>
                                        <option value="+30 day"> 30 Days </option>
                                        <option value="+365 day"> 365 Days </option>
                                    </select>
                                        <input class="btn btn-primary" type="submit" value="Set">
                            </form></span>
                        </div>
                    </div>
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- end basic form  -->
        </div>
    </div>
</div>
@endsection
