<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\question;
use App\Models\category;

class questionsAdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $questions = question::with('category', 'vocabulary')->paginate(10);
        return view('admin.questions.index')->with(compact('questions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories =  category::all();
        return view('admin.questions.create')->with(compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'vocabulary_id' => 'required|exists:vocabularies,id',
            'category_id' => 'required|exists:categories,id|not_in:error',
            'question' => 'required'
        ]);
        switch ($request->category_id) {
            case '1':
                $validated = $request->validate([
                    'a' => 'required',
                    'b' => 'required',
                    'c' => 'required',
                    'd' => 'required',
                    'correctMuptiple' => 'required'
                ]);
                switch ($request->correctMuptiple) {
                    case 'a':
                        $request->merge([
                            'answer' => $request->a,
                        ]);
                        break;
                    case 'b':
                        $request->merge([
                            'answer' => $request->b,
                        ]);
                        break;
                    case 'c':
                        $request->merge([
                            'answer' => $request->c,
                        ]);
                        break;
                    case 'd':
                        $request->merge([
                            'answer' => $request->d,
                        ]);
                        break;
                }

                question::create($request->all());
                return redirect()->back()->with('warm', 'you add success');
                break;
            case '2':
                $validated = $request->validate([
                    'question' => 'min:30',
                    'answer' => 'required'
                ]);
                question::create($request->all());
                if (isset($request->autoCreate) && $request->autoCreate == true) {
                    $question = $request->question;
                    $request->merge([
                        'question' => $request->answer,
                        'answer' => $question
                    ]);
                    question::create($request->all());
                }
                return redirect()->back()->with('warm', 'you add success');
                break;
            case '3':
                question::create($request->all());
                return redirect()->back()->with('warm', 'you add success');
                break;
            case '4':
                question::create($request->all());
                return redirect()->back()->with('warm', 'you add success');
                break;
            case '5':
                $validated = $request->validate([
                    'question' => 'min:30',
                    'answer' => 'required'
                ]);
                question::create($request->all());
                if (isset($request->autoCreate) && $request->autoCreate == true) {
                    $question = $request->question;
                    $request->merge([
                        'question' => $request->answer,
                        'answer' => $question
                    ]);
                    question::create($request->all());
                }
                return redirect()->back()->with('warm', 'you add success');
                break;
            default:
                return 'error';
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categories =  category::all();
        $question = question::find($id);
        return view('admin.questions.edit')->with(compact('question', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'vocabulary_id' => 'required|exists:vocabularies,id',
            'category_id' => 'required|exists:categories,id|not_in:error',
            'question' => 'required'
        ]);
        $question = question::find($id);
        switch ($request->category_id) {
            case '1':
                $validated = $request->validate([
                    'a' => 'required',
                    'b' => 'required',
                    'c' => 'required',
                    'd' => 'required',
                    'correctMuptiple' => 'required'
                ]);
                $question->vocabulary_id = $request->vocabulary_id;
                $question->category_id = $request->category_id;
                $question->question = $request->question;
                $question->a = $request->a;
                $question->b = $request->b;
                $question->c = $request->c;
                $question->d = $request->d;
                switch ($request->correctMuptiple) {
                    case 'a':
                        $question->answer = $request->a;
                        break;
                    case 'b':
                        $question->answer = $request->b;
                        break;
                    case 'c':
                        $question->answer = $request->c;
                        break;
                    case 'd':
                        $question->answer = $request->d;
                        break;
                }

                $question->save();
                return redirect()->route('admin.questions.index')->with('success', 'you edit success');
                break;
            case '2':
                $validated = $request->validate([
                    'question' => 'min:30',
                    'answer' => 'required'
                ]);
                $question->vocabulary_id = $request->vocabulary_id;
                $question->category_id = $request->category_id;
                $question->question = $request->question;
                $question->a = '';
                $question->b = '';
                $question->c = '';
                $question->d = '';
                $question->answer = $request->answer;
                $question->save();
                return redirect()->route('admin.questions.index')->with('success', 'you edit success');
                break;
            case '3':
                $question->vocabulary_id = $request->vocabulary_id;
                $question->category_id = $request->category_id;
                $question->question = $request->question;
                $question->a = '';
                $question->b = '';
                $question->c = '';
                $question->d = '';
                $question->answer = $request->question;
                $question->save();
                return redirect()->route('admin.questions.index')->with('success', 'you edit success');
                break;
            case '4':
                $question->vocabulary_id = $request->vocabulary_id;
                $question->category_id = $request->category_id;
                $question->question = $request->question;
                $question->a = '';
                $question->b = '';
                $question->c = '';
                $question->d = '';
                $question->answer = $request->question;
                $question->save();
                return redirect()->route('admin.questions.index')->with('success', 'you edit success');
                break;
                break;
            case '5':
                $validated = $request->validate([
                    'question' => 'min:30',
                    'answer' => 'required'
                ]);
                $question->vocabulary_id = $request->vocabulary_id;
                $question->category_id = $request->category_id;
                $question->question = $request->question;
                $question->a = '';
                $question->b = '';
                $question->c = '';
                $question->d = '';
                $question->answer = $request->answer;
                $question->save();
                return redirect()->route('admin.questions.index')->with('success', 'you edit success');
                break;
            default:
                return 'error';
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            question::where('id', $id)->delete();
            return redirect()->route('admin.questions.index')->with('success', 'You delete id=' . $id . ' success');
        } catch (\Exception $exception) {
            if ($exception->getCode() == 23000) {
                return redirect()->route('admin.questions.index')->with('success', 'You need delete data have this question ');
            }
        }
    }
}