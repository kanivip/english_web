<?php

namespace App\Http\Controllers;

use App\Models\learned;
use App\Models\lesson;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $nextLesson = '';
        if (Auth::check()) {
            $lessons = lesson::whereHas('users', function (Builder $query) {
                $query->where('learneds.status_buy', '=', 1)
                    ->where('learneds.status_learned', '=', 0);
            }, '=', Auth::user()->id)->take(3)->get();

            if (!empty($lessons)) {
                $lessons = lesson::with('level')->where('level_id', '=', '1')->take(3)->get();
            } else {
                $nextLesson = $lessons[0];
            }
        } else {
            $lessons = lesson::with('level')->where('level_id', '=', '1')->take(3)->get();
        }
        return view('home')->with(compact('lessons', 'nextLesson'));
    }
}