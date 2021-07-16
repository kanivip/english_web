<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\lesson;
use App\Models\level;
use App\Models\question;

class adminLessonsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $lessons = lesson::with('level', 'questions')->withCount('questions')->paginate(10);
        return view('admin.lessons.index')->with(compact('lessons'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $levels = level::all();
        $questions = question::with('category', 'vocabulary')->get();
        return view('admin.lessons.create')->with(compact('levels', 'questions'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'thread' => 'required|unique:lessons,thread|max:80',
            'level_id' => 'required|exists:levels,id',
            'point_required' => 'integer',
            'questions' => 'required|array|min:10|max:30',
            'questions.*' => 'required|exists:questions,id'
        ]);
        $lesson = new lesson;
        $lesson->thread = $request->thread;
        $lesson->point_required = $request->point_required;
        $lesson->level_id = $request->level_id;
        $lesson->save();
        $lesson->questions()->attach($request->questions);
        return redirect()->back()->with('warm', "You add success");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $lesson = lesson::with('questions')->find($id);
        $levels = level::all();
        $questions = question::with('category', 'vocabulary')->get();
        return view('admin.lessons.edit')->with(compact('levels', 'questions', 'lesson'));
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
            'thread' => 'required|unique:lessons,thread,' . $id . '|max:80',
            'level_id' => 'required|exists:levels,id',
            'point_required' => 'integer',
            'questions' => 'required|array|min:10|max:30',
            'questions.*' => 'required|exists:questions,id'
        ]);
        $lesson = lesson::find($id);
        $lesson->thread = $request->thread;
        $lesson->point_required = $request->point_required;
        $lesson->level_id = $request->level_id;
        $lesson->save();
        $lesson->questions()->sync($request->questions);
        return redirect()->route('admin.lessons.index')->with('success', "you edit success");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $lesson = lesson::find($id);
        $lesson->questions()->detach();
        $lesson->delete();
        return redirect()->route('admin.lessons.index')->with('success', "you delete success");
    }
}