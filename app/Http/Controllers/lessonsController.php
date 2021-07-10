<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\lesson;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;

class lessonsController extends Controller
{
    public function index()
    {
        //DB::statement("SET SQL_MODE=''");
        //$lessons = lesson::with('level', 'users')->orderby('level_id', 'asc')->paginate(6);
        $lessons = DB::table('users')
            ->selectRaw('users.id as user_id,lessons.*,learneds.status,levels.name')
            ->rightJoin('learneds', 'users.id', '=', 'learneds.user_id')
            ->rightJoin('lessons', 'lessons.id', '<>', 'learneds.lesson_id')
            ->join('levels', 'levels.id', '=', 'lessons.level_id')
            ->whereRaw('users.id =' . Auth::user()->id)
            ->groupByRaw('lessons.id')
            ->orderByRaw('lessons.level_id,lessons.point_required')
            ->paginate(6);
        return view('lessons.index')->with(compact('lessons'));
    }

    public function loadMore(Request $request)
    {
        DB::statement("SET SQL_MODE=''");
        //$lessons = lesson::with('level', 'users')->orderby('level_id', 'asc')->paginate(6);
        $lessons = DB::table('users')
            ->selectRaw('users.id as user_id,lessons.*,learneds.status,levels.name')
            ->rightJoin('learneds', 'users.id', '=', 'learneds.user_id')
            ->rightJoin('lessons', 'lessons.id', '<>', 'learneds.lesson_id')
            ->join('levels', 'levels.id', '=', 'lessons.level_id')
            ->whereRaw('users.id =' . Auth::user()->id)
            ->groupByRaw('lessons.id')
            ->orderByRaw('lessons.level_id,lessons.point_required')
            ->paginate(6);
        return response()->json(['view' => View::make('lessons.loadMoreData', compact('lessons'))->render()]);
    }
}