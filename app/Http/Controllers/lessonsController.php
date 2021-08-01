<?php

namespace App\Http\Controllers;

use App\Models\history;
use Illuminate\Http\Request;
use App\Models\lesson;
use Illuminate\Database\Eloquent\Builder;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;

class lessonsController extends Controller
{
    public function index()
    {
        DB::statement("SET SQL_MODE=''");
        //$lessons = lesson::with('level', 'users')->orderby('level_id', 'asc')->paginate(6);
        $subQuery = DB::table('users')
            ->selectRaw('users.id as user_id,lessons.*,learneds.status_learned,learneds.status_buy')
            ->rightJoin('learneds', 'users.id', '=', 'learneds.user_id')
            ->rightJoin('lessons', 'lessons.id', '=', 'learneds.lesson_id')
            ->whereRaw('users.id =' . Auth::user()->id)
            ->groupByRaw('lessons.id')
            ->orderByRaw('lessons.level_id,lessons.point_required');
        $lessons = DB::table(DB::raw('(' . $subQuery->toSql() . ') as user_learn'))
            ->select('lessons.*', 'name', 'status_learned', 'status_buy')
            ->rightJoin('lessons', 'lessons.id', '=', 'user_learn.id')
            ->join('levels', 'levels.id', '=', 'lessons.level_id')
            ->mergeBindings($subQuery)
            ->paginate(6);
        return view('lessons.index')->with(compact('lessons'));
    }

    public function study($id, Request $request)
    {
        $lesson = lesson::with('questions')->find($id);
        $request->session()->put('incorrect_' . $id, $lesson->questions);
        $request->session()->put('correct_' . $id, collect());
        $incorrect = $request->session()->get('incorrect_' . $id)->shuffle();
        $question = $incorrect->random();
        return view('lessons.study')->with(compact('question', 'lesson'));
    }

    public function loadMore(Request $request)
    {
        DB::statement("SET SQL_MODE=''");
        //$lessons = lesson::with('level', 'users')->orderby('level_id', 'asc')->paginate(6);
        $subQuery = DB::table('users')
            ->selectRaw('users.id as user_id,lessons.*,learneds.status_learned,learneds.status_buy')
            ->rightJoin('learneds', 'users.id', '=', 'learneds.user_id')
            ->rightJoin('lessons', 'lessons.id', '=', 'learneds.lesson_id')
            ->whereRaw('users.id =' . Auth::user()->id)
            ->groupByRaw('lessons.id')
            ->orderByRaw('lessons.level_id,lessons.point_required');
        $lessons = DB::table(DB::raw('(' . $subQuery->toSql() . ') as user_learn'))
            ->select('lessons.*', 'name', 'status_learned', 'status_buy')
            ->rightJoin('lessons', 'lessons.id', '=', 'user_learn.id')
            ->join('levels', 'levels.id', '=', 'lessons.level_id')
            ->mergeBindings($subQuery)
            ->paginate(6);
        return response()->json(['view' => View::make('lessons.loadMoreData', compact('lessons'))->render()]);
    }

    public function checkCoinLesson(Request $request)
    {
        $flag = false;
        $message = '';
        $lesson_id = $request->id;
        if (Auth::check() == false) {
            $flag = 'no user';
            $message = route('login');
            return response()->json([
                'message' => $message,
                'flag' => $flag,
            ]);
        }
        $user = Auth::user();
        $lesson = lesson::find($lesson_id);
        $user = user::with(array('lessons' => function ($query) use ($lesson_id) {
            $query->where('lessons.id', '=', $lesson_id);
        }))->find($user->id);
        if ($user->lessons->count() <= 0) {
            if ($lesson->point_required <= $user->point) {
                $user->point -= $lesson->point_required;
                $user->save();
                $history = new history([
                    'name' => 'used',
                    'point' => $lesson->point_required
                ]);
                $user->histories()->save($history);
                $user->lessons()->attach($lesson_id, [
                    'status_buy' => true,
                ]);
                $flag = true;
                $message = route('lessons.study', [$lesson_id]);
            } else if ($lesson->point_required > $user->point) {
                $message = 'Your coin not enough.';
            } else if ($lesson->point_required == 0) {
                $flag = true;
                $message = route('lessons.study', [$lesson_id]);
            } else {
                $message = "Have error";
            }
        } else {
            $flag = true;
            $message = route('lessons.study', [$lesson_id]);
        }
        return response()->json([
            'message' => $message,
            'flag' => $flag,
        ]);
    }

    public function showComments($id)
    {
        $lesson = lesson::with([
            'users' => function ($q) {
                $q->where('users.id', Auth::user()->id);
            }, 'usersComment' => function ($q) {
                $q->orderBy('comments.updated_at', 'DESC')
                    ->take(5)->get();
            }
        ])->where('id', $id)->first();
        $user = $lesson->usersComment->find(Auth::user()->id);
        return view('lessons.comment')->with(compact('lesson', 'user'));
    }

    public function addComment(Request $request)
    {

        $message = '';
        if (Auth::check()) {
            $lesson_id = $request->lesson_id;
            $content = $request->content ? $request->content : '';
            $lesson = lesson::find($lesson_id);
            if ($lesson->usersComment->contains(Auth::user()->id)) {
                $lesson->usersComment()->updateExistingPivot(Auth::user()->id, [
                    'content' => $content,
                ]);
                $message = "update";
            } else {
                $lesson->usersComment()->attach(Auth::user()->id, ['content' => $content]);
                $message = "add";
            }
        } else {
            $message = "You need to login";
        }
        return response()->json($message);
    }
    public function removeComment(Request $request)
    {
        $message = '';
        if (Auth::check()) {
            $lesson_id = $request->lesson_id;
            $lesson = lesson::find($lesson_id);
            $lesson->usersComment()->detach(Auth::user()->id);
            $message = "success";
        } else {
            $message = "You need to login";
        }
        return response()->json($message);
    }

    public function loadMoreComment(Request $request)
    {
        $lesson = lesson::with([
            'users' => function ($q) {
                $q->where('users.id', Auth::user()->id);
            }, 'usersComment' => function ($q) use ($request) {
                $q->orderBy('comments.updated_at', 'DESC')->skip($request->skip)
                    ->take(5)->get();
            }
        ])->where('id', $request->lesson_id)->first();
        $user = $lesson->usersComment->find(Auth::user()->id);
        return response()->json([
            'view' => View::make('lessons.loadMoreComment', compact('lesson'))->render()
        ]);
    }

    public function loadUserComment(Request $request)
    {
        $lesson = lesson::with([
            'users' => function ($q) {
                $q->where('users.id', Auth::user()->id);
            }, 'usersComment' => function ($q) {
                $q->orderBy('comments.updated_at', 'DESC')
                    ->take(5)->get();
            }
        ])->where('id', $request->lesson_id)->first();
        $user = $lesson->usersComment->find(Auth::user()->id);
        return response()->json([
            'view' => View::make('lessons.loadUserComment', compact('user'))->render()
        ]);
    }
}