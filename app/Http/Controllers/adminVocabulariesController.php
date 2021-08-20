<?php

namespace App\Http\Controllers;

use App\Exports\VocabulariesExport;
use Illuminate\Http\Request;
use App\Models\vocabulary;
use App\Helper\Helper;
use App\Imports\VocabulariesImport;
use Illuminate\Support\Facades\Validator;
use Maatwebsite\Excel\Facades\Excel;
use Storage;

class adminVocabulariesController extends Controller
{


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $vocabularies = vocabulary::paginate(10);
        return view('admin.vocabularies.index')->with(compact('vocabularies'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.vocabularies.create');
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
            'name' => 'required|unique:vocabularies,name|max:50',
            'meaning' => 'required|unique:vocabularies,meaning|max:50',
            'image' => 'image|mimes:jpg,png,jpeg|max:1024',
        ]);
        $name = '';
        if ($request->image != null) {
            $name = $request->image->getClientOriginalName() . time();
            Storage::disk('google')->put($name,  file_get_contents($request->file('image')->getRealPath()));
            $helper = new Helper;
            $name = $helper->getImage($name);
        }
        vocabulary::create(array_merge($request->all(), ['image' => $name]));
        return redirect()->route('admin.vocabularies.index')->with('success', 'You add ' . $request->name . ' success');
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
        $vocabulary = vocabulary::find($id);
        return view('admin.vocabularies.edit')->with(compact('vocabulary'));
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
            'name' => 'required|unique:vocabularies,name,' . $id . '|max:50',
            'meaning' => 'required|unique:vocabularies,meaning,' . $id . '|max:50',
            'image' => 'image|mimes:jpg,png,jpeg|max:1024',
        ]);
        $name = '';
        $vocabulary = vocabulary::find($id);
        if ($request->image != null) {
            Storage::disk('google')->delete($vocabulary->image);
            $name = $request->image->getClientOriginalName() . time();
            Storage::disk('google')->put($name,  file_get_contents($request->file('image')->getRealPath()));
            $helper = new Helper;
            $name = $helper->getImage($name);
            $vocabulary->image = $name;
        }
        $vocabulary->name = $request->name;
        $vocabulary->meaning = $request->meaning;
        $vocabulary->content = $request->content;
        $vocabulary->save();
        return redirect()->route('admin.vocabularies.index')->with('success', 'You update ' . $request->name . ' success');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $vocabulary = vocabulary::find($id);
        Storage::disk('google')->delete($vocabulary->image);
        $vocabulary->delete();
        return redirect()->back()->with('success', 'You delete id=' . $id . ' success');
    }
    public function export()
    {
        return Excel::download(new Vocabulariesexport, 'vocabularies.xlsx');
    }

    public function showImport()
    {
        return view('admin.vocabularies.import');
    }

    public function import(Request $request)
    {
        $validated = $request->validate([
            'file' => 'required|mimes:csv,xlsx,xls|max:2048'
        ]);
        $import = new VocabulariesImport;
        $import->import($request->file);
        if ($import->failures()->isNotEmpty()) {
            return redirect()->route('admin.vocabularies.showImport')->with('error', $import->failures());
        }

        return redirect()->route('admin.vocabularies.showImport')->with('message', 'Success');
    }
}