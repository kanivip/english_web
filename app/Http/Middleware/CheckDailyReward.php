<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Alert;
use App\Models\User;
use App\Models\history;

use function PHPUnit\Framework\isNull;

class CheckDailyReward
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
        if(auth()->check()){
            $user = user::find(Auth::user()->id);
            
            if(date('Y-m-d') > $user->daily_reward){
                $user->daily_reward = date('Y-m-d');
                $user->point += 5;
                if($user->save()){
                    $history = new history;
                    $history->user_id = Auth::user()->id;
                    $history->name = 'Daily Reward';
                    $history->point = 10;
                    $history->save();

                    alert()->success('Daily Reward', 'Your reward today is 5 coin');
                }
            }
            
        }
        return $next($request);
    }
}
