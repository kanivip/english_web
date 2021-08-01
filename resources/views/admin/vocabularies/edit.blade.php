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
                    <h2 class="pageheader-title">Admin vocabularies</h2>
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
                        <h5 class="card-header">Edit</h5>
                        <div class="card-body">
                            <form method="post" action="{{route('admin.vocabularies.update',$vocabulary->id)}}"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label for="inputText3" class="col-form-label">Name Vocabulary</label>
                                    <input id="inputText3" value="{{old('name',$vocabulary->name)}}" name="name"
                                        type="text" class="form-control @error('name') is-invalid @enderror">
                                </div>
                                @error('name')
                                <div class="alert alert-warning alert-danger fade show">
                                    <strong>{{ $message }}</strong>
                                </div>
                                @enderror

                                <div class="form-group">
                                    <label for="inputText3" class="col-form-label">Meaning</label>
                                    <input id="inputText3" value="{{old('meaning',$vocabulary->meaning)}}"
                                        name="meaning" type="text"
                                        class="form-control @error('meaning') is-invalid @enderror">
                                </div>
                                @error('meaning')
                                <div class="alert alert-warning alert-danger fade show">
                                    <strong>{{ $message }}</strong>
                                </div>
                                @enderror
                                <div class="form-group">
                                    <label for="exampleFormControlTextarea1">Content</label>
                                    <textarea name="content" class="form-control" id="exampleFormControlTextarea1"
                                        rows="3">{{old('content',$vocabulary->content)}}</textarea>
                                </div>
                                <div class="form-group">
                                    <div class="custom-file">
                                        <input name="image" type="file" class="custom-file-input" id="image-src">
                                        <label class="custom-file-label" for="customFile">Choose
                                            file</label>
                                    </div>
                                    <div class="col-sm-6 p-2">
                                        <img class="img-thumbnail"
                                            src="{{'https://drive.google.com/uc?export=view&id='.$vocabulary->image}}"
                                            id="image-target" />
                                    </div>
                                    @error('image')
                                    <div class="alert alert-warning alert-danger fade show">
                                        <strong>{{ $message }}</strong>
                                    </div>
                                    @enderror
                                </div>

                                <input class="btn btn-primary" type="submit" value="edit">
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
