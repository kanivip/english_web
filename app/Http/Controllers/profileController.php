<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\vip;
use Illuminate\Http\Request;

class profileController extends Controller
{
    public function index($id)
    {
        return view('profile.index');
    }
}
