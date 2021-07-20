<?php

namespace App\Http\Middleware;

use App\Models\level;
use App\Models\User;
use Closure;
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
        \DB::statement("SET SQL_MODE=''");
        $lesson_id = $request->route()->parameter('id');
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
        // check lesson bought
        if ($user->lessons->count() <= 0) {
            return redirect()->route('lessons.index')->with('message', 'You need buy this Lesson ' . $lesson_id);;
        } else {
            //check user
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