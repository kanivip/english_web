<?php

namespace App\Http\Controllers;

use App\Models\role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Auth;
use App\Models\ban_reasons;

class adminUsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $role = auth()->user();
        $users = user::with('role')->where('role_id', '>', $role)->orderBy('id', 'DESC')->paginate(10);
        return view('admin.users.index')->with(compact('users'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $users = user::find($id);
        $roles = role::get()->where('id', '>', auth()->user()->role_id);
        return view('admin.users.edit')->with(compact('users', 'roles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'first_name' => 'required|max:50',
            'last_name' => 'required|max:50',
            'address' => 'required',
            'phone' => 'required|max:10',
        ]);
        $name = '';
        $user = user::find($id);
        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->address = $request->address;
        $user->phone = $request->phone;
        $user->role_id = $request->role;
        $user->save();
        return redirect()->route('admin.users.index')->with('success', 'You edit user ' . $user->email . ' success');
    }

    public function create()
    {
        return view('admin.users.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'first_name' => ['required', 'string', 'max:30'],
            'last_name' => ['required', 'string', 'max:30'],
            'phone' => ['required', 'numeric', 'digits:10',],
            'address' => ['required', 'string'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
        $name = '';
        User::create([
            'first_name' => $request['first_name'],
            'last_name' => $request['last_name'],
            'phone' => $request['phone'],
            'address' => $request['address'],
            'email' => $request['email'],
            'password' => Hash::make($request['password']),
        ]);
        return redirect()->route('admin.users.index')->with('success', 'You add ' . $request->email . ' success');
    }

    public function ban($id)
    {
        $users = user::find($id);
        $reasons = ban_reasons::get();
        return view('admin.users.banned')->with(compact('users', 'reasons'));
    }

    public function banned(Request $request, $id)
    {
        $user = user::find($id);
        $end_day = strtotime(date("Y-m-d") . $request['ban_day']);
        $end_day = strftime("%Y-%m-%d", $end_day);

        $user->status_id = 2;
        $user->end_ban = $end_day;
        $user->ban_reason_id = $request->reason;
        $user->save();
        return redirect()->route('admin.users.index')->with('success', 'You banned user ' . $user->email . ' success');
    }

    public function unban($id)
    {
        $users = user::find($id);
        $reason = ban_reasons::where('id', $users->ban_reason_id)->first();

        $now = time();
        $user_date = strtotime($users->end_ban);
        $day = abs($user_date - $now);
        $ban_day = round($day / (60 * 60 * 24));
        return view('admin.users.unban')->with(compact('users', 'reason', 'ban_day'));
    }

    public function unbanned($id)
    {
        $user = user::find($id);
        $user->status_id = 1;
        $user->save();
        return redirect()->route('admin.users.index')->with('success', 'You unbanned user ' . $user->email . ' success');
    }
}