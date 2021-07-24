<?php

namespace App\Http\Controllers;

use App\Models\history;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class eventsController extends Controller
{
    public function index()
    {
        return view('events.index');
    }

    public function revise(Request $request)
    {
        //get ramdom 10 questions
        $allQuestions = collect();
        $user = User::with('learneds', 'learneds.questions')->findOrFail(Auth::user()->id);
        foreach ($user->learneds as $lesson) {
            $lesson->questions->map(function ($item, $key) use ($allQuestions) {
                return $allQuestions->push($item);
            });
        };
        if ($allQuestions->count() < 10) {
            return redirect()->back()->with('message', "You need to finish lessson before revise");
        }
        $request->session()->put('questions_random', $allQuestions->random(10));
        $request->session()->put('incorrect_random', collect());
        $request->session()->put('correct_random', collect());
        $request->session()->put('process_random', 0);
        $questions = $request->session()->get('questions_random');
        $question = $questions->random();
        return view('events.revise')->with(compact('question'));
    }

    public function reviseResult(Request $request)
    {
        if ($request->session()->has('incorrect_random')) {
            $incorrect = $request->session()->get('incorrect_random');
        }
        if ($request->session()->has('correct_random')) {
            $correct = $request->session()->get('correct_random');
        }
        $day = Carbon::now()->format('d');
        $month = Carbon::now()->format('m');
        $year = Carbon::now()->format('Y');
        $historyUser = history::where('name', '=', 'revise')->whereDay('created_at', '=', $day)
            ->whereMonth('created_at', '=', $month)
            ->whereYear('created_at', '=', $year)->first();
        $coin = $correct->count();
        if ($correct->count() > 0) {
            if ($historyUser == null) {
                DB::transaction(function () use ($coin) {
                    $user = User::find(Auth::user()->id);
                    $user->point += $coin;
                    $user->save();
                    $history = new history([
                        'name' => 'revise',
                        'point' => $coin
                    ]);
                    $user->histories()->save($history);
                });
            }
        }
        return view('events.reviseResult')->with(compact('incorrect', 'correct', 'coin', 'historyUser'));
    }
}