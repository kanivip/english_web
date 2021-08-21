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
                    <h2 class="pageheader-title">Admin Vocabylaries</h2>
                    <p class="pageheader-text">Nulla euismod urna eros, sit amet scelerisque torton lectus
                        vel mauris facilisis faucibus at enim quis massa lobortis rutrum.</p>
                    <div class="page-breadcrumb">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Import</a></li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- end pageheader  -->
        <!-- ============================================================== -->
        <form class="form-inline" method="POST" action="{{route('admin.questions.import')}}"
            enctype="multipart/form-data">
            @csrf

            <div class="custom-file">
                <input name="file" type="file" class="custom-file-input" id="customFile">
                <label class="custom-file-label" for="customFile">Choose file</label>
                @error('file')
                <div class="alert alert-warning alert-danger fade show">
                    <strong>{{ $message }}</strong>
                </div>
                @enderror
                <div class="mt-2">
                    <button class="btn btn-primary" type="submit">Submit</button>
                </div>
                @if(session()->has('error'))
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Row</th>
                            <th scope="col">Colomn</th>
                            <th scope="col">Error</th>
                            <th scope="col">Value</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach(session()->get('error') as $error)
                        <tr>
                            <td>{{$error->row()}}</td>
                            <td>{{$error->attribute()}}</td>
                            <td>
                                <ul>
                                    @foreach($error->errors() as $e)
                                    <li>{{$e}}</li>
                                    @endforeach
                                </ul>
                            </td>
                            <td>{{ isset($error->values()[$error->attribute()]) ? $error->values()[$error->attribute()] : ''  }}
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                @endif
            </div>


        </form>

    </div>
</div>
@endsection
