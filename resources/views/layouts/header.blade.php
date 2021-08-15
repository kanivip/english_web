<header class="header">

    <!-- Top Bar -->
    <div class="top_bar">
        <div class="top_bar_container">
            <div class="container">
                <div class="row">
                    <div class="col">
                        <div class="top_bar_content d-flex flex-row align-items-center justify-content-start">
                            <div class="top_bar_phone"><span class="top_bar_title">phone:</span>+44 300 303 0266
                            </div>
                            <div class="top_bar_right ml-auto">

                                <!-- Language -->
                                <div class="top_bar_lang">
                                    <span class="top_bar_title">site language:</span>
                                    <ul class="lang_list">
                                        <li class="hassubs">
                                            <a href="#">English<i class="fa fa-angle-down" aria-hidden="true"></i></a>
                                            <!--                                             <ul>
                                                <li><a href="#">Ukrainian</a></li>
                                                <li><a href="#">Japanese</a></li>
                                                <li><a href="#">Lithuanian</a></li>
                                                <li><a href="#">Swedish</a></li>
                                                <li><a href="#">Italian</a></li>
                                            </ul> -->
                                        </li>
                                    </ul>
                                </div>

                                <!-- Social -->
                                <div class="top_bar_social">
                                    <span class="top_bar_title social_title">follow us</span>
                                    <ul>
                                        <li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                                        </li>
                                        <li><a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a>
                                        </li>
                                        <li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Header Content -->
    <div class="header_container">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="header_content d-flex flex-row align-items-center justify-content-start">
                        <div class="logo_container mr-auto">
                            <a href="{{route('home')}}">
                                <div class="logo_text">Lingua</div>
                            </a>
                        </div>
                        <nav class="main_nav_contaner">
                            <ul class="main_nav">
                                <li class="{{ Route::is('home') ? 'active' : '' }}"><a href="{{route('home')}}">Home</a>
                                </li>
                                <li class="{{ Route::is('lessons.*') ? 'active' : '' }}"><a
                                        href="{{route('lessons.index')}}">Lessons</a></li>
                                <li class="{{ Route::is('events.*') ? 'active' : '' }}"><a
                                        href="{{route('events.index')}}">Events</a></li>
                            </ul>
                        </nav>
                        <div class="header_content_right ml-auto text-right w-auto">

                            <!--                           <div class="header_search">
                                <div class="search_form_container">
                                    <form action="#" id="search_form" class="search_form trans_400">
                                        <input type="search" class="header_search_input trans_400"
                                            placeholder="Type for Search" required="required">
                                        <div class="search_button">
                                            <i class="fa fa-search" aria-hidden="true"></i>
                                        </div>
                                    </form>
                                </div>
                            </div> -->

                            <!-- Hamburger -->
                            @guest
                            @if(Route::has('login'))
                            <a href="{{ route('login') }}">
                                <div class="user">
                                    <i class="fa fa-user" aria-hidden="true">
                                    </i>
                                </div>
                            </a>
                            @endif
                            @else
                            <div class="top_bar_lang">

                                <ul class="lang_list">
                                    <li class="hassubs">
                                        <a href="#">
                                            @if(!empty(Auth::user()->vip) && Auth::user()->vip->end_day >=
                                            date('Y-m-d'))
                                            <i class="fas fa-gem"></i>
                                            @endif
                                            {{ Auth::user()->first_name.' '.Auth::user()->last_name }}<i
                                                class="fa fa-angle-down" aria-hidden="true"></i></a>
                                        <ul>
                                            <li><a href="{{route('profile',Auth::user()->id)}}">Profile</a></li>
                                            <li>{{Auth::user()->point}} <span style="color: yellow;"><i
                                                        class="fas fa-coins"></i></span></li>
                                            @if(Auth::user()->role_id==1)
                                            <li><a href="{{route('admin.dashbroad')}}">Admin</a></li>
                                            @endif
                                            <li> <a style="padding:0;" href="{{route('user.changePassword')}}">
                                                    Change Password</a></li>
                                            <li>
                                                <a href="{{ route('logout') }}" onclick="event.preventDefault();
                                                document.getElementById('logout-form').submit();">
                                                    {{ __('Logout') }}
                                                </a>

                                                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                                    class="d-none">
                                                    @csrf
                                                </form>
                                            </li>

                                        </ul>

                                    </li>

                                </ul>
                            </div>
                            @endguest
                            <div class="hamburger menu_mm">
                                <i class="fa fa-bars menu_mm" aria-hidden="true"></i>
                            </div>

                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

</header>
