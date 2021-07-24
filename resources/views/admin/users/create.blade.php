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
                        <h5 class="card-header">Create</h5>
                        <div class="card-body">
                            <form method="post" action="{{route('admin.users.store')}}"
                                enctype="multipart/form-data">
                                @csrf
                                @include('component.error')
                                <div class="form-group">
                                    <label for="inputText3" class="col-form-label">First Name</label>
                                    <input id="inputText3" value="{{old('first_name')}}" name="first_name"
                                        type="text" class="form-control @error('first_name') is-invalid @enderror">
                                </div>

                                <div class="form-group">
                                    <label for="inputText3" class="col-form-label">Last Name</label>
                                    <input id="inputText3" value="{{old('last_name')}}"
                                        name="last_name" type="text"
                                        class="form-control @error('last_name') is-invalid @enderror">
                                </div>

                                <div class="form-group">
                                    <label for="inputText3" class="col-form-label">Phonenumber</label>
                                    <input id="inputText3" value="{{old('phone')}}"
                                        name="phone" type="number"
                                        class="form-control @error('phone') is-invalid @enderror">
                                </div>

                                <div class="form-group">
                                    <label for="inputText3" class="col-form-label">Address</label>
                                    <input id="inputText3" value="{{old('address')}}"
                                        name="address" type="text"
                                        class="form-control @error('address') is-invalid @enderror">
                                </div>

                                <div class="form-group">
                                    <label for="inputText3" class="col-form-label">Email</label>
                                    <input id="inputText3" value="{{old('email')}}"
                                        name="email" type="text"
                                        class="form-control @error('email') is-invalid @enderror">
                                </div>

                                <div class="form-group">
                                    <label for="inputText3" class="col-form-label">Password</label>
                                    <input id="inputText3" value="{{old('password')}}"
                                        name="password" type="password"
                                        class="form-control @error('password') is-invalid @enderror" autocomplete="new-password">
                                </div>

                                <div class="form-group">
                                    <label for="inputText3" class="col-form-label">Confirm Password</label>
                                    <input id="inputText3" value="{{old('password-confirm')}}"
                                        name="password_confirmation" type="password"
                                        class="form-control @error('password-confirm') is-invalid @enderror" autocomplete="new-password">
                                </div>

                                <input class="btn btn-primary" type="submit" value="Create">
                            </form>
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
