<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\vocabularies;

class vocabulariesController extends Controller
{
    public function searchVocabulary(Request $request)
    {
        $vocabulary = vocabularies::where('name', $request->key)
            ->orWhere('name', 'like', '%' . $request->key . '%')->orderBy('name', 'asc')->limit(5)->get();
        return response()->json($vocabulary);
    }

    public function searchVocabularyById(Request $request)
    {
        $vocabulary = vocabularies::where('id', $request->id)->get();
        return response()->json($vocabulary);
    }
}