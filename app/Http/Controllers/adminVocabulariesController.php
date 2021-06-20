<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\vocabularies;
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
        $vocabularies = vocabularies::paginate(10);
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
        if(isset($request->image))
        {
            $name = $request->image->getClientOriginalName().time();
            Storage::disk('google')->put($name,  file_get_contents($request->file('image')->getRealPath()));
            $name = $this->getImage($name);
        }
        vocabularies::create(array_merge($request->all(), ['image' =>$name ]));
        return redirect()->route('admin.vocabularies.index')->with('success','You add '.$request->name.' success');
    }


    private function getImage($name)
    {
        $filename = $name;

        $dir = '/';
        $recursive = false; // Get subdirectories also?
        $contents = collect(Storage::disk('google')->listContents($dir, $recursive));
    
        $file = $contents
            ->where('type', '=', 'file')
            ->where('filename', '=', pathinfo($filename, PATHINFO_FILENAME))
            ->where('extension', '=', pathinfo($filename, PATHINFO_EXTENSION))
            ->first(); // there can be duplicate file names!
    
        //return $file; // array with file info
    
        return $file['path'];
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}