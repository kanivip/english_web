@extends('layouts.app')
@section('content')
<div class="home">
    <div class="home_background" style="background-image: url(images/index_background.jpg);"></div>
    <div class="home_content">
        <div class="container">
            <div class="row">
                <div class="col text-center">
                    <h1 class="home_title">Learn Languages Easily</h1>
                    <div class="home_button trans_200">
                        @if($nextLesson != '')
                        <a href="{{route('lessons.study',$nextLesson->id)}}">get
                            started</a>
                        @else
                        <a href="{{route('lessons.index')}}">get
                            started</a>
                        @endif </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Language -->

<div class="language">
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="language_slider_container">

                    <!-- Language Slider -->

                    <div class="owl-carousel owl-theme language_slider">

                        <!-- Flag -->
                        <div class="owl-item language_item">
                            <a href="#">
                                <div class="flag"><img src="images/Ukrainian.svg" alt=""></div>
                                <div class="lang_name">Ukrainian</div>
                            </a>
                        </div>

                        <!-- Flag -->
                        <div class="owl-item language_item">
                            <a href="#">
                                <div class="flag"><img src="images/Japanese.svg" alt=""></div>
                                <div class="lang_name">Japanese</div>
                            </a>
                        </div>

                        <!-- Flag -->
                        <div class="owl-item language_item">
                            <a href="#">
                                <div class="flag"><img src="images/Lithuanian.svg" alt=""></div>
                                <div class="lang_name">Lithuanian</div>
                            </a>
                        </div>

                        <!-- Flag -->
                        <div class="owl-item language_item">
                            <a href="#">
                                <div class="flag"><img src="images/Swedish.svg" alt=""></div>
                                <div class="lang_name">Swedish</div>
                            </a>
                        </div>

                        <!-- Flag -->
                        <div class="owl-item language_item">
                            <a href="#">
                                <div class="flag"><img src="images/English.svg" alt=""></div>
                                <div class="lang_name">English</div>
                            </a>
                        </div>

                        <!-- Flag -->
                        <div class="owl-item language_item">
                            <a href="#">
                                <div class="flag"><img src="images/Italian.svg" alt=""></div>
                                <div class="lang_name">Italian</div>
                            </a>
                        </div>

                        <!-- Flag -->
                        <div class="owl-item language_item">
                            <a href="#">
                                <div class="flag"><img src="images/Chinese.svg" alt=""></div>
                                <div class="lang_name">Chinese</div>
                            </a>
                        </div>

                        <!-- Flag -->
                        <div class="owl-item language_item">
                            <a href="#">
                                <div class="flag"><img src="images/French.svg" alt=""></div>
                                <div class="lang_name">French</div>
                            </a>
                        </div>

                        <!-- Flag -->
                        <div class="owl-item language_item">
                            <a href="#">
                                <div class="flag"><img src="images/German.svg" alt=""></div>
                                <div class="lang_name">German</div>
                            </a>
                        </div>

                    </div>

                    <div class="lang_nav lang_prev"><i class="fa fa-angle-left" aria-hidden="true"></i></div>
                    <div class="lang_nav lang_next"><i class="fa fa-angle-right" aria-hidden="true"></i></div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Courses -->

<div class="courses">
    <div class="courses_background"></div>
    <div class="container">
        <div class="row">
            <div class="col">
                <h2 class="section_title text-center">Popular Online Courses</h2>
            </div>
        </div>
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
                                <li><a href="instructors.html">{{$lesson->level->name}}</a></li>
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

                                {{$lesson->point_required}}

                            </a>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach

        </div>
    </div>

    <!-- Instructors -->

    <div class="instructors">
        <div class="instructors_background" style="background-image:url(images/instructors_background.png)"></div>
        <div class="container">
            <div class="row">
                <div class="col">
                    <h2 class="section_title text-center">The Best Tutors in Town</h2>
                </div>
            </div>
            <div class="row instructors_row">

                <!-- Instructor -->
                <div class="col-lg-4 instructor_col">
                    <div class="instructor text-center">
                        <div class="instructor_image_container">
                            <div class="instructor_image"><img src="images/instructor_1.jpg" alt=""></div>
                        </div>
                        <div class="instructor_name"><a href="instructors.html">Sarah Parker</a></div>
                        <div class="instructor_title">Teacher</div>
                        <div class="instructor_text">
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce enim nulla, mollis eu
                                metus in, sagittis fringilla tortor.</p>
                        </div>
                        <div class="instructor_social">
                            <ul>
                                <li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                                <li><a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
                                <li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>

                <!-- Instructor -->
                <div class="col-lg-4 instructor_col">
                    <div class="instructor text-center">
                        <div class="instructor_image_container">
                            <div class="instructor_image"><img src="images/instructor_2.jpg" alt=""></div>
                        </div>
                        <div class="instructor_name"><a href="instructors.html">Sarah Parker</a></div>
                        <div class="instructor_title">Teacher</div>
                        <div class="instructor_text">
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce enim nulla, mollis eu
                                metus in, sagittis fringilla tortor.</p>
                        </div>
                        <div class="instructor_social">
                            <ul>
                                <li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                                <li><a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
                                <li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>

                <!-- Instructor -->
                <div class="col-lg-4 instructor_col">
                    <div class="instructor text-center">
                        <div class="instructor_image_container">
                            <div class="instructor_image"><img src="images/instructor_3.jpg" alt=""></div>
                        </div>
                        <div class="instructor_name"><a href="instructors.html">Sarah Parker</a></div>
                        <div class="instructor_title">Teacher</div>
                        <div class="instructor_text">
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce enim nulla, mollis eu
                                metus in, sagittis fringilla tortor.</p>
                        </div>
                        <div class="instructor_social">
                            <ul>
                                <li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                                <li><a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
                                <li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>



    <!-- Events -->

    <div class="events">
        <div class="container">
            <div class="row">
                <div class="col">
                    <h2 class="section_title text-center">Upcoming Events</h2>
                </div>
            </div>
            <<div class="row events_row">

                <!-- Event -->
                <div class="col-lg-4 event_col">
                    <div class="event">
                        <div class="event_image"><img src="{{asset('images/event_1.jpg')}}" alt=""></div>
                        <div class="event_date d-flex flex-column align-items-center justify-content-center">
                            <div class="event_day">{{date('d')}}</div>
                            <div class="event_month">{{date('m')}}</div>
                        </div>
                        <div class="event_body d-flex flex-row align-items-center justify-content-start">
                            <div class="event_title"><a href="#">Revise</a></div>
                            <a href="{{route('events.revise')}}" class="event_tag ml-auto">
                                <div>Go</div>
                            </a>
                        </div>
                    </div>
                </div>




        </div>
    </div>
</div>

<!-- Blog -->

<div class="blog">
    <div class="container">
        <div class="row row-lg-eq-height">

            <!-- Blog Left -->
            <div class="col-lg-6">
                <div class="blog_left">
                    <div class="blog_title">From Our Blog</div>
                    <div class="blog_text">
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce enim nulla, mollis eu
                            metus in, sagittis fringilla tortor.</p>
                    </div>
                    <div class="blog_categories">
                        <div class="row categories_row">

                            <!-- Category -->
                            <div class="col-md-4 blog_category_col">
                                <a href="blog.html">
                                    <div class="blog_category">
                                        <div class="blog_category_image"><img src="images/blog_1.jpg" alt="">
                                        </div>
                                        <div class="blog_category_title">travel</div>
                                    </div>
                                </a>
                            </div>

                            <!-- Category -->
                            <div class="col-md-4 blog_category_col">
                                <a href="blog.html">
                                    <div class="blog_category">
                                        <div class="blog_category_image"><img src="images/blog_2.jpg" alt="">
                                        </div>
                                        <div class="blog_category_title">languages</div>
                                    </div>
                                </a>
                            </div>

                            <!-- Category -->
                            <div class="col-md-4 blog_category_col">
                                <a href="blog.html">
                                    <div class="blog_category">
                                        <div class="blog_category_image"><img src="images/blog_3.jpg" alt="">
                                        </div>
                                        <div class="blog_category_title">cultures</div>
                                    </div>
                                </a>
                            </div>

                            <!-- Category -->
                            <div class="col-md-4 blog_category_col">
                                <a href="blog.html">
                                    <div class="blog_category">
                                        <div class="blog_category_image"><img src="images/blog_4.jpg" alt="">
                                        </div>
                                        <div class="blog_category_title">fashion</div>
                                    </div>
                                </a>
                            </div>

                            <!-- Category -->
                            <div class="col-md-4 blog_category_col">
                                <a href="blog.html">
                                    <div class="blog_category">
                                        <div class="blog_category_image"><img src="images/blog_5.jpg" alt="">
                                        </div>
                                        <div class="blog_category_title">cooking</div>
                                    </div>
                                </a>
                            </div>

                            <!-- Category -->
                            <div class="col-md-4 blog_category_col">
                                <a href="blog.html">
                                    <div class="blog_category">
                                        <div class="blog_category_image"><img src="images/blog_6.jpg" alt="">
                                        </div>
                                        <div class="blog_category_title">hobbies</div>
                                    </div>
                                </a>
                            </div>

                        </div>
                    </div>
                </div>
            </div>

            <!-- Blog Right -->

            <div class="col-lg-6">
                <div class="blog_right">
                    <div class="blog_image" style="background-image:url(images/blog_7.jpg)"></div>
                    <div class="blog_title_container">
                        <div class="blog_right_category"><a href="#">travel</a></div>
                        <div class="blog_right_title"><a href="blog_single.html">Design Better Forms</a></div>
                        <div class="blog_right_text">
                            <p>Whether it is a signup flow, a multi-view stepper, or a monotonous data entry
                                interface, forms are one of the most important components of digital product
                                design.</p>
                        </div>
                        <div class="read_more"><a href="blog_single.html">Read More <img src="images/right.png"
                                    alt=""></a></div>
                    </div>
                </div>
            </div>
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
