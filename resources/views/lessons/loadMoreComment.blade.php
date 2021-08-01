@foreach($lesson->usersComment as $user)

<div class="commented-section mt-2">
    <div class="d-flex flex-row align-items-center commented-user">
        <h5 class="mr-2">{{$user->first_name.' '.$user->last_name}}</h5><span class="dot mb-1"></span><span
            class="mb-1 ml-2">{{$user->pivot->updated_at}}</span>
    </div>
    <div class="comment-text-sm">
        <span>{{$user->pivot->content}}</span>
    </div>
</div>
<hr>
@endforeach
