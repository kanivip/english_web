<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class homeAdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function dashbroad()
    {
        $users = User::select(DB::raw('YEAR(created_at) year'))
            ->groupBy('year')
            ->get();
        return view('admin.dashbroad')->with(compact('users'));
    }
}