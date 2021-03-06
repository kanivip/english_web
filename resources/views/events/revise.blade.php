@extends('layouts.app')
@section('content')
<!-- Home -->

<div class="home" style="height: 30%;">
</div>
<div class="container" style="width: 100%">
    <div class="progress mt-2">
        <div id="process-bar" class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="40"
            aria-valuemin="0" aria-valuemax="100">
            0
        </div>

    </div>

    <div id="revise" class="row p-4">
        @switch($question->category_id)
        @case(1)
        <!-- multiple choice -->
        <div data-value="{{$question->id}}" id="question" class="col p-2">
            <div class="row">
                <div class="col mini-box">Questions: {{$question->question}}</div>
            </div>

            <div id="category" data-value="{{$question->category_id}}" class="row pt-3">
                <div class="btn-group btn-group-toggle row" data-toggle="buttons">

                    <label class="text-left btn btn-secondary m-2 col">{{$question->a}}
                        <input type="radio" name="options" id="option1" value="a" autocomplete="off">
                    </label>
                    <label class="text-left btn btn-secondary m-2 col">{{$question->b}}
                        <input type="radio" name="options" id="option2" value="b" autocomplete="off" checked>
                    </label>
                    <label class="text-left btn btn-secondary col m-2">{{$question->c}}
                        <input type="radio" name="options" id="option3" value="c" autocomplete="off">

                    </label>
                    <label class="text-left btn btn-secondary col m-2">{{$question->d}}
                        <input type="radio" name="options" id="option3" value="d" autocomplete="off">
                    </label>

                </div>
            </div>
        </div>
        @break
        @case(2)
        <!-- sentence -->
        <div data-value="{{$question->id}}" id="question" class=" col p-2">
            <div class="row">
                <div class="col mini-box">Questions: {{$question->question}} </div>
            </div>

            <div id="category" data-value="{{$question->category_id}}" class="row pt-3">
                <div class="col">
                    <div style="border-style: solid none solid none; border-color:cornflowerblue;" id="yourAnswer"
                        class="row"></div>
                    <div id="answer" class="row" style="margin-top: 5%;">{{$question->answer}}</div>
                </div>
            </div>
        </div>
        @break
        @case(3)
        <!-- listening -->
        <div data-value="{{$question->id}}" id="question" class=" col p-2">
            <div class="row">
                <div class="col mini-box"><button id="btn-pronounce" data-value="{{$question->question}}"
                        class="btn btn-primary"><i class="fas fa-volume-up "></i></button>
                    <button id="btn-pronounce-low" data-value="{{$question->question}}" class="btn btn-primary"><i
                            class="fas fa-otter"></i></button>
                </div>
            </div>

            <div id="category" data-value="{{$question->category_id}}" class="row pt-3">
                <div class="col">
                    <div style="border-style: solid none solid none; border-color:cornflowerblue;" id="yourAnswer"
                        class="row"></div>
                    <div id="answer" class="row" style="margin-top: 5%;">{{$question->answer}}</div>
                </div>
            </div>

        </div>
        @break
        @case(5)
        <!-- writing -->
        <div data-value="{{$question->id}}" id="question" class=" col p-2">
            <div class="row">
                <div class="col mini-box"><button id="btn-pronounce" data-value="{{$question->question}}"
                        class="btn btn-primary"><i class="fas fa-volume-up "></i></button>
                    <button id="btn-pronounce-low" data-value="{{$question->question}}" class="btn btn-primary"><i
                            class="fas fa-otter"></i></button>
                </div>
            </div>

            <div id="category" data-value="{{$question->category_id}}" class="row pt-3">
                <div class="col form-group">
                    <label for="yourAnswerText">Your answer</label>
                    <textarea class="form-control" id="yourAnswerText" rows="3"></textarea>
                </div>
            </div>

        </div>
        @break
        @endswitch
    </div>
    <div class="row pb-2">
        <button id="checkQuestion" type="button" style="width: 20%" class="  mx-auto btn btn-primary">Check</button>
    </div>
</div>
@endsection
<!-- Modal message question -->
<div class="modal fade" id="messageQuestion" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Message</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div id="message-question" class="modal-body">

            </div>
            <div class="modal-footer">
                <button type="button" data-learn="0" id="btn-next" data-dismiss="modal"
                    class="btn btn-primary">Ok</button>
            </div>
        </div>
    </div>
</div>
