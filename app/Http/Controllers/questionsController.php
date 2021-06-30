<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\lesson;
use Illuminate\Support\Facades\View;

class QuestionsController extends Controller
{
    public function getQuestionByLesson(Request $request)
    {
        $lessons = lesson::with('questions', 'questions.category', 'questions.vocabulary')->where('id', $request->id)->first();
        return response()->json(['view' => View::make('admin.questions.rowModal', compact('lessons'))->render()]);
    }
}