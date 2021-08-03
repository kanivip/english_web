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
                    <h2 class="pageheader-title">Question</h2>
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
                            <form method="post" action="{{route('admin.questions.store')}}">
                                @csrf
                                <div class="form-group">
                                    <label for="inputText3" class="col-form-label">Vocabulary</label>
                                    <input list="datalistVocabulary" id="inputVocabulary" value="{{old('vocabulary')}}"
                                        name="vocabulary_id" type="text"
                                        class="form-control @error('vocabulary') is-invalid @enderror">
                                </div>
                                <datalist id="datalistVocabulary">
                                </datalist>
                                @error('vocabulary')
                                <div class="alert alert-warning alert-danger fade show">
                                    <strong>{{ dd($message) }}</strong>
                                </div>
                                @enderror
                                <div class="form-group">
                                    <label for="inputText3" class="col-form-label">Category</label>
                                    <select id="selectCategory" value="{{old('category_id')}}" name="category_id"
                                        class="custom-select">
                                        @foreach($categories as $category)
                                        <option {{ old('category_id') == $category->id ? "selected" : "" }}
                                            value="{{$category->id}}">
                                            {{$category->name}}
                                        </option>
                                        @endforeach
                                    </select>
                                </div>
                                @error('category_id')
                                <div class="alert alert-warning alert-danger fade show">
                                    <strong>{{ $message }}</strong>
                                </div>
                                @enderror
                                <label for="inputText3" class="col-form-label">Questions</label>
                                <input id="question" value="{{old('question')}}" name="question" type="text"
                                    class="form-control @error('question') is-invalid @enderror">
                                @error('question')
                                <div class="alert alert-warning alert-danger fade show">
                                    <strong>{{ $message }}</strong>
                                </div>
                                @enderror
                                <div class="form-group">
                                    <div style="display:none" id="multiple-choice" class="form-group">



                                        <div id="answer_a">
                                            <label for="inputText3" class="col-form-label">Answer A</label>
                                            <input value="{{old('a')}}" name="a" type="text"
                                                class="form-control @error('a') is-invalid @enderror">
                                            <div class="custom-control custom-radio">
                                                <input type="radio" value="a" id="customRadio1" name="correctMuptiple"
                                                    class="custom-control-input">
                                                <label class="custom-control-label" for="customRadio1">Correct
                                                    Answer</label>
                                            </div>
                                            @error('a')
                                            <div class="alert alert-warning alert-danger fade show">
                                                <strong>{{ $message }}</strong>
                                            </div>
                                            @enderror
                                        </div>
                                        <div id="answer_b">
                                            <label for="inputText3" class="col-form-label">Answer B</label>
                                            <input id="answer_b" value="{{old('b')}}" name="b" type="text"
                                                class="form-control @error('b') is-invalid @enderror">
                                            <div class="custom-control custom-radio">
                                                <input type="radio" value="b" id="customRadio2" name="correctMuptiple"
                                                    class="custom-control-input">
                                                <label class="custom-control-label" for="customRadio2">Correct
                                                    Answer</label>
                                            </div>
                                            @error('b')
                                            <div class="alert alert-warning alert-danger fade show">
                                                <strong>{{ $message }}</strong>
                                            </div>
                                            @enderror
                                        </div>
                                        <div id="answer_c">
                                            <label for="inputText3" class="col-form-label">Answer C</label>
                                            <input id="answer_c" value="{{old('c')}}" name="c" type="text"
                                                class="form-control @error('c') is-invalid @enderror">
                                            <div class="custom-control custom-radio">
                                                <input type="radio" value="c" id="customRadio3" name="correctMuptiple"
                                                    class="custom-control-input">
                                                <label class="custom-control-label" for="customRadio3">Correct
                                                    Answer</label>
                                            </div>
                                            @error('c')
                                            <div class="alert alert-warning alert-danger fade show">
                                                <strong>{{ $message }}</strong>
                                            </div>
                                            @enderror
                                        </div>
                                        <div id="answer_d">
                                            <label for="inputText3" class="col-form-label">Answer D</label>
                                            <input id="answer_d" value="{{old('d')}}" name="d" type="text"
                                                class="form-control @error('d') is-invalid @enderror">
                                            <div class="custom-control custom-radio">
                                                <input type="radio" value="d" id="customRadio4" name="correctMuptiple"
                                                    class="custom-control-input">
                                                <label class="custom-control-label" for="customRadio4">Correct
                                                    Answer</label>
                                            </div>
                                            @error('d')
                                            <div class="alert alert-warning alert-danger fade show">
                                                <strong>{{ $message }}</strong>
                                            </div>
                                            @enderror
                                        </div>

                                    </div>
                                    <div style="display:none" id="correctAnswer">
                                        <label for="inputText3" class="col-form-label">Correct Answer</label>
                                        <input value="{{old('answer')}}" name="answer" type="text"
                                            class="form-control @error('answer') is-invalid @enderror">
                                        @error('answer')
                                        <div class="alert alert-warning alert-danger fade show">
                                            <strong>{{ $message }}</strong>
                                        </div>
                                        @enderror
                                    </div>
                                    <div style="display:none" id="checkbox-auto">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" name="autoCreate" class="custom-control-input"
                                                id="customCheck1">
                                            <label class="custom-control-label" for="customCheck1">Check auto create
                                                same question(reverse)</label>
                                        </div>
                                        @error('d')
                                        <div class="alert alert-warning alert-danger fade show">
                                            <strong>{{ $message }}</strong>
                                        </div>
                                        @enderror
                                    </div>
                                    @error('correctMuptiple')
                                    <div class="alert alert-warning alert-danger fade show">
                                        <strong>{{ $message }}</strong>
                                    </div>
                                    @enderror
                                    @if (session('warm'))
                                    <div class="alert alert-success">
                                        {{ session('warm') }}
                                    </div>
                                    @endif
                                </div>
                                <input class="btn btn-primary" type="submit" value="add">
                        </div>


                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        setInterval(function () {
            var correctAnswer = document.getElementById('correctAnswer');
            var multipleChoice = document.getElementById('multiple-choice');
            var autoCreate = document.getElementById('checkbox-auto');
            autoCreate.style.display = "none";
            correctAnswer.style.display = "none";
            switch (document.getElementById("selectCategory").value) {
                case "1":
                    multipleChoice.style.display = "block";
                    autoCreate.style.display = "none";
                    correctAnswer.style.display = "none";
                    break;
                case "2":
                    multipleChoice.style.display = "none";
                    autoCreate.style.display = "block";
                    correctAnswer.style.display = "block";
                    break;
                case "3":
                    multipleChoice.style.display = "none";
                    autoCreate.style.display = "none";
                    correctAnswer.style.display = "none";
                    break;
                case "4":
                    multipleChoice.style.display = "none";
                    autoCreate.style.display = "none";
                    correctAnswer.style.display = "none";
                    break;
                case "5":
                    multipleChoice.style.display = "none";
                    autoCreate.style.display = "block";
                    correctAnswer.style.display = "block";
                    break;
            }
        }, 500);

    </script>
    <!-- ============================================================== -->
    <!-- end basic form  -->
    @endsection
