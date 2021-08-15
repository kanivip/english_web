<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\vip;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class profileController extends Controller
{
    public function index($id)
    {
        $user = user::withCount('learneds')->find(Auth::user()->id);

        return view('profile.index')->with(compact('user'));
    }
}