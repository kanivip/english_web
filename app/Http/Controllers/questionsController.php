<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\lesson;
use App\Models\question;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;

class QuestionsController extends Controller
{
    public function getQuestionByLesson(Request $request)
    {
        $lessons = lesson::with('questions', 'questions.category', 'questions.vocabulary')->where('id', $request->id)->first();
        return response()->json(['view' => View::make('admin.questions.rowModal', compact('lessons'))->render()]);
    }

    public function getAndCheckQuestion(Request $request)
    {
        $message = false;
        $questionNow = question::find($request->question_id);
        $question = "";
        $incorrect = '';
        $correct = '';
        $url = '';
        $lesson = lesson::with('questions')->find($request->lesson_id);
        $answerUser = $request->answer;
        if ($request->session()->has('incorrect')) {
            $incorrect = $request->session()->get('incorrect');
        } else {
            $request->session()->put('incorrect', $lesson->questions);
        }
        if ($request->session()->has('correct')) {
            $correct = $request->session()->get('correct');
        } else {
            $request->session()->put('correct', collect());
        }
        $question = $incorrect->random();
        foreach ($incorrect as $key => $value) {
            if ($value->id == $request->question_id && $value->answer == $request->answer) {
                $correct->push($value);
                $incorrect->forget($key);
                $message = true;
            }
        }
        if ($correct->count() == $lesson->questions->count()) {
            $request->session()->forget(['incorrect', 'correct', 'process']);
            $user = user::find(Auth::user()->id);
            $user->lessons()->updateExistingPivot($request->lesson_id, [
                'status_learned' => true,
            ]);
            $message = "finish";
            $url = route('lessons.index');
        }
        $request->session()->put('process', ceil($correct->count() / $lesson->questions->count() * 100));
        $process =  $request->session()->get('process');
        return response()->json(['view' => View::make('questions.question', compact('question'))->render(), compact('questionNow', 'process', 'message', 'url')]);
    }
}