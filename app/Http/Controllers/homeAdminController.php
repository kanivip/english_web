<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class homeAdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function dashbroad()
    {
        return view('admin.dashbroad');
    }
}