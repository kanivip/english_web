<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\level;

class adminLevelsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $levels = level::paginate(5);
        return view('admin.levels.index')->with(compact('levels'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.levels.create');
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
            'name' => 'required|unique:levels,name|max:30',
        ]);
        level::create($request->all());
        return redirect()->route('admin.levels.index')->with('success', 'You add ' . $request->name . ' success');
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
        $level = level::find($id);
        return view('admin.levels.edit')->with(compact('level'));
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
            'name' => 'required|unique:levels,name,' . $id . '|max:30',
        ]);
        level::where('id', $id)->update(['name' => $request->name]);
        return redirect()->route('admin.levels.index')->with('success', 'You update ' . $request->name . ' success');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        level::where('id', $id)->delete();
        return redirect()->route('admin.levels.index')->with('success', 'You delete id=' . $id . ' success');
    }
}