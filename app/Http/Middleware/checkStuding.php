<?php

namespace App\Http\Middleware;

use App\Models\lesson;
use App\Models\level;
use App\Models\User;
use Closure;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class checkStuding
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        // check vip
        if (isset(Auth::user()->load('vip')->vip->end_day))
            $vip = Auth::user()->load('vip')->vip->end_day >= Carbon::now()->format('Y-m-d');
        else
            $vip = false;
        \DB::statement("SET SQL_MODE=''");
        $lesson_id = $request->route()->parameter('id');
        $lesson = lesson::find($lesson_id);
        $user = User::with(['lessons' => function ($q) use ($lesson_id) {
            $q->where('lessons.id', '=', $lesson_id)->wherePivot('status_buy', '=', 1)->count();
        }])->find(Auth::user()->id);
        $levelAll = level::with('lessons')->get();
        //user learned
        $userLearned = User::with(['lessons' => function ($q) use ($lesson_id) {
            $q->select('level_id', DB::raw('count(*) as total'))
                ->wherePivot('status_learned', '=', 1)
                ->groupBy('level_id')
                ->get();
        }])->find(Auth::user()->id);
        $userLearnedToday = User::with(['lessons' => function ($q) {
            $q->wherePivot('status_learned', '=', 1)
                ->whereDate('learneds.updated_at', '=', Carbon::now()->format('Y-m-d'))
                ->get();
        }])->find(Auth::user()->id);
        if ($userLearnedToday->lessons->count() > 3 && $vip == false) {
            return redirect()->route('lessons.index')->with('message', 'Your limit lesson is 3.Become VIP to have more benefit');
        }
        // check lesson bought
        if ($user->lessons->count() <= 0) {
            if ($vip == true) {
                return $next($request);
            }
            return redirect()->route('lessons.index')->with('message', 'You need buy this Lesson ' . $lesson_id);
        } else {
            //check user
            if ($lesson->level_id == 1) {
                return $next($request);
            }
            if ($userLearned->lessons->count() <= 0) {
                return redirect()->route('lessons.index')->with('message', 'You need to finish Lesson ' . $levelAll[0]->name);
            }
            for ($i = 0; $i < $levelAll->count(); $i++) {
                if ($levelAll[$i]->lessons->count() != $userLearned->lessons[$i]->total) {
                    return redirect()->route('lessons.index')->with('message', 'You need to finish Lesson ' . $levelAll[$i]->name);
                    break;
                }
            }
        }

        return $next($request);
    }
}