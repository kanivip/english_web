@if($user)
<div class="commented-section mt-2">
    <div class="d-flex flex-row align-items-center commented-user">
        <h5 class="mr-2 text-primary">{{$user->first_name.' '.$user->last_name}}</h5><span class="dot mb-1"></span><span
            class="datetime mb-1 ml-2">{{$user->pivot->created_at}}</span>
        <button id="comment-remove" class="btn btn-light mb-1 ml-2">X</button>
    </div>
    <div class="comment-text-sm">
        <span>{{$user->pivot->content}}</span>
    </div>
</div>
<div class="d-none spinner-border text-primary" role="status">
    <span class="sr-only">Loading...</span>
</div>
<hr>
@endif
