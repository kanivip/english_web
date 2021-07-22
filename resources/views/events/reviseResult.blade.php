@extends('layouts.app')
@section('content')
<!-- Home -->

<div class="home" style="height: 110px;">
</div>


<!-- Courses -->

<div class="courses">
    <div class="container">
        @foreach($incorrect as $question)
        <div class="alert bg-warning">
            Question: {{$question[0]->question }} <br />
            Your answer: {{$question[1] }} <br />
            Answer: {{$question[0]->answer}}
        </div>
        @endforeach

        @foreach($correct as $question)
        <div class="alert bg-success">
            Question: {{$question[0]->question }} <br />
            Your answer: {{$question[1] }} <br />
            Answer: {{$question[0]->answer}}
        </div>
        @endforeach
        @if($historyUser == null)
        <div class="alert bg-primary">
            Congratulation, you will revecei {{$coin}} Coin.
        </div>
        @endif
    </div>
</div>
@endsection
