<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\questions;
use App\Models\categories;

class questionsAdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $questions = questions::with('category', 'vocabulary')->paginate(10);
        return view('admin.questions.index')->with(compact('questions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories =  categories::all();
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
            case '0':
                $validated = $request->validate([
                    'a' => 'required',
                    'b' => 'required',
                    'c' => 'required',
                    'd' => 'required',
                    'correctMuptiple' => 'required'
                ]);
                $request->merge([
                    'answer' => $request->correctMuptiple,
                ]);
                questions::create($request->all());
                return redirect()->back()->with('warm', 'you add success');
                break;
            case '1':
                $validated = $request->validate([
                    'question' => 'min:30',
                    'answer' => 'required'
                ]);
                questions::create($request->all());
                if (isset($request->autoCreate) && $request->autoCreate == true) {
                    $question = $request->question;
                    $request->merge([
                        'question' => $request->answer,
                        'answer' => $question
                    ]);
                    questions::create($request->all());
                }
                return redirect()->back()->with('warm', 'you add success');
                break;
            case '2':
                questions::create($request->all());
                return redirect()->back()->with('warm', 'you add success');
                break;
            case '3':
                questions::create($request->all());
                return redirect()->back()->with('warm', 'you add success');
                break;
            case '4':
                $validated = $request->validate([
                    'question' => 'min:30',
                    'answer' => 'required'
                ]);
                questions::create($request->all());
                if (isset($request->autoCreate) && $request->autoCreate == true) {
                    $question = $request->question;
                    $request->merge([
                        'question' => $request->answer,
                        'answer' => $question
                    ]);
                    questions::create($request->all());
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
        $categories =  categories::all();
        $question = questions::find($id);
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
        $question = questions::find($id);
        switch ($request->category_id) {
            case '0':
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
                $question->answer = $request->correctMuptiple;
                $question->save();
                return redirect()->route('admin.questions.index')->with('success', 'you edit success');
                break;
            case '1':
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
            case '2':
                $question->vocabulary_id = $request->vocabulary_id;
                $question->category_id = $request->category_id;
                $question->question = $request->question;
                $question->a = '';
                $question->b = '';
                $question->c = '';
                $question->d = '';
                $question->answer = '';
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
                $question->answer = '';
                $question->save();
                return redirect()->route('admin.questions.index')->with('success', 'you edit success');
                break;
                break;
            case '4':
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
        questions::where('id', $id)->delete();
        return redirect()->route('admin.questions.index')->with('success', 'You delete id=' . $id . ' success');
    }
}