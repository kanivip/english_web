@extends('layouts.app')
@section('content')
<!-- Home -->

<div class="home" style="height: 20%;">

</div>


<!-- Events -->

<div class="events">
    <div class="container">
        @if (session('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
        @endif
        <div class="row">
            <div class="col">
                <h2 class="section_title text-center">Upcoming Events</h2>
            </div>
        </div>
        <div class="row events_row">

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
