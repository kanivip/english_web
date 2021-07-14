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
        <div class="col mini-box">Questions: {{$question->question}}</div>
    </div>

    <div id="category" data-value="{{$question->category_id}}" class="row pt-3">
        <div class="col">
            <div style="border-style: solid none solid none; border-color:cornflowerblue;" id="yourAnswer" class="row">
            </div>
            <div id="answer" class="row" style="margin-top: 5%;">{{$question->answer}}</div>
        </div>
    </div>
</div>
@break
@endswitch
