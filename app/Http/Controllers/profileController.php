<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class profileController extends Controller
{
    public function index($id)
    {
        return view('profile.index');
    }
}
