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
        DB::statement("SET SQL_MODE=''");
        //$lessons = lesson::with('level', 'users')->orderby('level_id', 'asc')->paginate(6);
        $subQuery = DB::table('users')
            ->selectRaw('users.id as user_id,lessons.*,learneds.status_learned,learneds.status_buy')
            ->rightJoin('learneds', 'users.id', '=', 'learneds.user_id')
            ->rightJoin('lessons', 'lessons.id', '=', 'learneds.lesson_id')
            ->whereRaw('users.id =' . Auth::user()->id)
            ->groupByRaw('lessons.id')
            ->orderByRaw('lessons.level_id,lessons.point_required');
        $lessons = DB::table(DB::raw('(' . $subQuery->toSql() . ') as user_learn'))
            ->select('lessons.*', 'name', 'status_learned', 'status_buy')
            ->rightJoin('lessons', 'lessons.id', '=', 'user_learn.id')
            ->join('levels', 'levels.id', '=', 'lessons.level_id')
            ->mergeBindings($subQuery)
            ->paginate(6);
        return view('lessons.index')->with(compact('lessons'));
    }

    public function study()
    {
        return "lesson";
    }

    public function loadMore(Request $request)
    {
        DB::statement("SET SQL_MODE=''");
        //$lessons = lesson::with('level', 'users')->orderby('level_id', 'asc')->paginate(6);
        $subQuery = DB::table('users')
            ->selectRaw('users.id as user_id,lessons.*,learneds.status_learned,learneds.status_buy')
            ->rightJoin('learneds', 'users.id', '=', 'learneds.user_id')
            ->rightJoin('lessons', 'lessons.id', '=', 'learneds.lesson_id')
            ->whereRaw('users.id =' . Auth::user()->id)
            ->groupByRaw('lessons.id')
            ->orderByRaw('lessons.level_id,lessons.point_required');
        $lessons = DB::table(DB::raw('(' . $subQuery->toSql() . ') as user_learn'))
            ->select('lessons.*', 'name', 'status_learned', 'status_buy')
            ->rightJoin('lessons', 'lessons.id', '=', 'user_learn.id')
            ->join('levels', 'levels.id', '=', 'lessons.level_id')
            ->mergeBindings($subQuery)
            ->paginate(6);
        return response()->json(['view' => View::make('lessons.loadMoreData', compact('lessons'))->render()]);
    }

    public function checkLesson(Request $request)
    {
        $url = route('lessons.checkLesson', [$request->id]);
        return response()->json($url);
    }
}