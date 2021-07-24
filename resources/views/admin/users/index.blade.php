@extends('admin.layout')
@section('content')
<div class="row">
    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
        <div class="card">
            <h5 class="card-header">Basic Table</h5>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered first">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Email</th>
                                <th>First Name</th>
                                <th>Last Name</th>
                                <th>Address</th>
                                <th>Phone</th>
                                <th>Role</th>
                                <th>Status</th>
                                <th class="border-0">Option</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($users as $user)
                            <tr>
                                <td>{{$user->id}}</td>
                                <td>{{$user->email}}</td>
                                <td>{{$user->first_name}}</td>
                                <td>{{$user->last_name}}</td>
                                <td>{{$user->address}}</td>
                                <td>{{$user->phone}}</td>
                                <td>{{$user->role->name}}</td>

                                @if (Cache::has('user-is-online-' . $user->id))
                                <td style="color: #00f">Online</td>
                                @elseif ($user->status_id == 2)
                                <td style="color: #f00">{{$user->status->name}}</td>
                                @else
                                <td>Offline</td>
                                @endif

                                <td><a href="{{route('admin.users.edit',$user->id)}}"><i class="fas fa-edit"></i></a>
                                    @if($user->status_id == 2)
                                    <a href="{{route('admin.users.unban',$user->id)}}"><i class="fas fa-check"></i></a>
                                    @else
                                    <a href="{{route('admin.users.ban',$user->id)}}"><i class="fas fa-ban"></i></a>
                                    @endif
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection