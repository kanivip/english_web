<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\question;
use Illuminate\Support\Facades\View;


class questionController extends Controller
{
    public function getQuestionByLesson(Request $request)
    {
        $question = question::with('lessons')->withPivot('lessons_id')->get();
        dd($question[0]->lessons);
        return response()->json(['view' => View::make('admin.questions.rowModal', compact('question'))->render()]);
    }
}