@foreach($lessons as $key => $lesson)
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
            <a href="{{route('lessons.showComments',$lesson->id)}}">
                <div class="course_students">
                    <i class="fas fa-comments"></i>
                    <span>{{isset($comment[$key]->comments_count)?$comment[$key]->comments_count:''}}</span>
                </div>
            </a>
            <div class="course_rating ml-auto"><i class="fa fa-star" aria-hidden="true"></i><span>4,5</span>
            </div>
            <div class="learnLesson course_mark trans_200" data-value="{{$lesson->id}}">
                <a href="#a">
                    @if($lesson->status_learned==1)
                    Learned
                    @elseif($lesson->status_buy==1 || $lesson->point_required == 0 || $vip)
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
