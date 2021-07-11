@extends('layouts.app')
@section('content')
<!-- Home -->

<div class="home">

</div>


<!-- Courses -->

<div class="courses">
    <div class="container">
        <div class="row courses_row">
            @foreach($lessons as $lesson)
            <!-- Course -->
            <div class="col-lg-4 course_col">
                <div class="course">
                    <div class="course_image"><img src="images/course_4.jpg" alt=""></div>
                    <div class="course_body">
                        <div class="course_title"><a href="course.html">{{$lesson->thread}}</a></div>
                        <div class="course_info">
                            <ul>
                                <li><a href="instructors.html">{{$lesson->name}}</a></li>
                                <li><a href="#">English</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="course_footer d-flex flex-row align-items-center justify-content-start">
                        <div class="course_students"><i class="fa fa-user" aria-hidden="true"></i><span>10</span></div>
                        <div class="course_rating ml-auto"><i class="fa fa-star" aria-hidden="true"></i><span>4,5</span>
                        </div>
                        <div class="learnLesson course_mark trans_200" data-value="{{$lesson->id}}">
                            <a href="#a">

                                @if($lesson->status_buy==1 || $lesson->point_required == 0)
                                Free
                                @else
                                {{$lesson->point_required}}
                                @endif
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach



        </div>

        <div class="row">
            <div class="col">
                <div class="load_more_button" data-value="1"><a href="javascript:void(0)">load more</a></div>
            </div>
        </div>
    </div>
</div>
@endsection
<!-- Modal confirm learn -->
<div class="modal fade" id="learnModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Hello</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" data-learn="0" id="btn-learn" class="btn btn-primary">Learn</button>
            </div>
        </div>
    </div>
</div>
