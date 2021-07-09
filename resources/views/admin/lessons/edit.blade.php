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
                        <h5 class="card-header">Edit</h5>
                        <div class="card-body">
                            <form method="post" action="{{route('admin.lessons.update',$lesson->id)}}">
                                @csrf
                                <div class="form-group">
                                    <label for="inputText3" class="col-form-label">Thread</label>
                                    <input id="inputText3" value="{{old('thread',$lesson->thread)}}" name="thread"
                                        type="text" class="form-control @error('thread') is-invalid @enderror">
                                </div>
                                @error('thread')
                                <div class="alert alert-warning alert-danger fade show">
                                    <strong>{{ $message }}</strong>
                                </div>
                                @enderror
                                <div class="form-group">
                                    <label for="inputText3" class="col-form-label">Level</label>
                                    <select id="selectLevel" value="{{old('level_id',$lesson->level_id)}}"
                                        name="level_id" class="custom-select">
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
                                <div class="form-group">
                                    <label for="inputText3" class="col-form-label">Point_required</label>
                                    <input id="inputText3" value="{{old('point_required',$lesson->point_required)}}"
                                        name="point_required" type="number"
                                        class="form-control @error('point_required') is-invalid @enderror">
                                </div>
                                @error('point_required')
                                <div class="alert alert-warning alert-danger fade show">
                                    <strong>{{ $message }}</strong>
                                </div>
                                @enderror
                                <table id="demo123" class="display" style="width:100%">
                                    <thead>
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
                                    <tfoot>
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
                                    </tfoot>
                                </table>
                                @error('questions')
                                <div class="alert alert-warning alert-danger fade show">
                                    <strong>{{ $message }}</strong>
                                </div>
                                @enderror
                                <div class="questions d-none">
                                    @foreach($lesson->questions as $question)
                                    <input name="questions[]" value="{{$question->id}}" type="number" />
                                    @endforeach
                                </div>
                                <input class="btn btn-primary" type="submit" value="submit">
                            </form>
                            @if (session('warm'))
                            <div class="alert alert-success p-1">
                                {{ session('warm') }}
                            </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>

            <!-- ============================================================== -->
            <!-- end basic form  -->
        </div>
    </div>
</div>
<script>


</script>
@endsection
