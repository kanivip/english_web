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
        //create or get session by lesson id
        if ($request->session()->has('incorrect_' . $request->lesson_id)) {
            $incorrect = $request->session()->get('incorrect_' . $request->lesson_id);
        } else {
            $request->session()->put('incorrect_' . $request->lesson_id, $lesson->questions);
        }
        if ($request->session()->has('correct_' . $request->lesson_id)) {
            $correct = $request->session()->get('correct_' . $request->lesson_id);
        } else {
            $request->session()->put('correct_' . $request->lesson_id, collect());
        }
        //check question'answer
        foreach ($incorrect as $key => $value) {
            if ($value->id == $request->question_id && $value->answer == $request->answer) {
                $correct->push($value);
                $incorrect->forget($key);
                $message = true;
            }
        }
        if (!$incorrect->isEmpty()) {
            $question = $incorrect->random();
        }

        $request->session()->put('process_' . $request->lesson_id, ceil($correct->count() / $lesson->questions->count() * 100));
        $process =  $request->session()->get('process_' . $request->lesson_id);
        //update table learned 
        if ($correct->count() == $lesson->questions->count()) {
            $request->session()->forget(['incorrect_' . $request->id, 'correct' . $request->id, 'process']);
            $user = user::with('lessons')->find(Auth::user()->id);
            $user->lessons()->updateExistingPivot($request->lesson_id, [
                'status_learned' => true,
            ]);
            $message = "finish";
            $url = route('lessons.index');
            return response()->json(['view' => '', compact('questionNow', 'process', 'message', 'url')]);
        }


        return response()->json(['view' => View::make('questions.question', compact('question'))->render(), compact('questionNow', 'process', 'message', 'url')]);
    }

    public function getAndCheckQuestionRevise(Request $request)
    {
        $message = false;
        $questionNow = question::find($request->question_id);
        $question = "";
        $incorrect = '';
        $questionRandom = '';
        $correct = '';
        $answerUser = $request->answer;
        //create or get session by lesson id
        if ($request->session()->has('incorrect_random')) {
            $incorrect = $request->session()->get('incorrect_random');
        }
        if ($request->session()->has('correct_random')) {
            $correct = $request->session()->get('correct_random');
        }
        if ($request->session()->has('questions_random')) {
            $questionRandom = $request->session()->get('questions_random');
        }

        //check question'answer
        foreach ($questionRandom as $key => $value) {
            if ($value->id == $request->question_id && $value->answer == $request->answer) {
                $correct->push([$value, $request->answer]);
                $questionRandom->forget($key);
                $message = true;
                break;
            } else if ($value->id == $request->question_id && $value->answer != $request->answer) {
                $incorrect->push([$value, $request->answer]);
                $questionRandom->forget($key);
                $message = false;
            }
        }
        if (!$questionRandom->isEmpty()) {
            $question = $questionRandom->random();
        } else {
            $request->session()->put('process_random', ceil($correct->count() / 10 * 100));
            $process =  $request->session()->get('process_random');
            $message = "finish";
            $url = route('events.reviseResult');
            return response()->json(['view' => '', compact('questionNow', 'process', 'message', 'url')]);
        }

        $request->session()->put('process_random', ceil($correct->count() / 10 * 100));
        $process =  $request->session()->get('process_random');
        return response()->json(['view' => View::make('questions.question', compact('question'))->render(), compact('questionNow', 'process', 'message')]);
    }
}