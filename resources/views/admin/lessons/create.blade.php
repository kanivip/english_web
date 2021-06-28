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
                    <h2 class="pageheader-title">Admin Lessons</h2>
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
                        <h5 class="card-header">Add</h5>
                        <div class="card-body">
                            <form method="post" action="{{route('admin.lessons.store')}}">
                                @csrf
                                <div class="form-group">
                                    <label for="inputText3" class="col-form-label">Thread</label>
                                    <input id="inputText3" value="{{old('thread')}}" name="thread" type="text"
                                        class="form-control @error('thread') is-invalid @enderror">
                                </div>
                                @error('thread')
                                <div class="alert alert-warning alert-danger fade show">
                                    <strong>{{ $message }}</strong>
                                </div>
                                @enderror
                                <div class="form-group">
                                    <label for="inputText3" class="col-form-label">Level</label>
                                    <select id="selectLevel" name="level_id" class="custom-select">
                                        <option value="error" selected>Open this select menu</option>
                                        @foreach($levels as $level)
                                        <option value="{{$level->id}}">{{$level->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                @error('level_id')
                                <div class="alert alert-warning alert-danger fade show">
                                    <strong>{{ $message }}</strong>
                                </div>
                                @enderror
                                <div class="card">
                                    <h5 class="card-header">Questions</h5>
                                    <div class="card-body p-0">
                                        <div class="table-responsive">
                                            <table class="table">
                                                <thead class="bg-light">
                                                    <tr class="border-0">
                                                        <th class="border-0">#</th>
                                                        <th class="border-0">{{__('Category')}}</th>
                                                        <th class="border-0">{{__('Vocabolary')}}</th>
                                                        <th class="border-0">{{__('Question')}}</th>
                                                        <th class="border-0">{{__('Answer A')}}</th>
                                                        <th class="border-0">{{__('Answer B')}}</th>
                                                        <th class="border-0">{{__('Answer C')}}</th>
                                                        <th class="border-0">{{__('Answer D')}}</th>
                                                        <th class="border-0">{{__('Answer')}}</th>

                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach($questions as $question)
                                                    <tr>
                                                        <td>{{$question->id}}</td>
                                                        <td>{{$question->category->name}}</td>
                                                        <td>{{$question->vocabulary->name}}</td>
                                                        <td>{{$question->question}}</td>
                                                        <td>{{$question->a}}</td>
                                                        <td>{{$question->b}}</td>
                                                        <td>{{$question->c}}</td>
                                                        <td>{{$question->d}}</td>
                                                        <td>{{$question->answer}}</td>
                                                    </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>

                                        </div>
                                    </div>
                                </div>
                                <input class="btn btn-primary" type="submit" value="add">
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
