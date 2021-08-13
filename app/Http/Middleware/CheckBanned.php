<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class CheckBanned
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
        if (auth()->check() && (Auth::user()->status_id == 2)) {
            $user = User::with('reason')->find(Auth::user()->id);
            if ($user->end_ban > date('Y-m-d')) {

                $error = "Your account has been banned for " . $user->reason->name . ", will be unban on: " . $user->end_ban;
                Auth::logout();
                $request->session()->invalidate();
                $request->session()->regenerateToken();
                return redirect()->route('login')->with(compact('error'));
            }

            $user->status_id = 1;
            $user->save();

            
        }
        return $next($request);
    }
}