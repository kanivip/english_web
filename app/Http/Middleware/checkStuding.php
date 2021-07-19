<?php

namespace App\Http\Middleware;

use App\Models\User;
use Closure;
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
        $lesson_id = $request->route()->parameter('id');
        $user = User::with(['lessons' => function ($q) use ($lesson_id) {
            $q->where('lessons.id', '=', $lesson_id)->wherePivot('status_buy', '=', 1);
        }])->find(Auth::user()->id);
        if ($user->lessons->count() <= 0) {
            return redirect()->route('lessons.index');
        }
        return $next($request);
    }
}