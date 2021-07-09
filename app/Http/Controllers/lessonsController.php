<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\lesson;
use Illuminate\Support\Facades\View;

class lessonsController extends Controller
{
    public function index()
    {
        $lessons = lesson::with('level')->orderby('level_id', 'asc')->paginate(6);
        return view('lessons.index')->with(compact('lessons'));
    }

    public function loadMore(Request $request)
    {
        $lessons = lesson::with('level')->orderby('level_id', 'asc')->paginate(6);
        return response()->json(['view' => View::make('lessons.loadMoreData', compact('lessons'))->render()]);
    }
}