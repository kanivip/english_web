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
            $error = "Reason: " . $user->reason->name . " && DayEnd Ban: " . $user->end_ban;

            Auth::logout();

            $request->session()->invalidate();

            $request->session()->regenerateToken();



            return redirect()->route('login')->with(compact('error'));
        }
        return $next($request);
    }
}