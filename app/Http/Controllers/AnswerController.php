<?php

namespace App\Http\Controllers;
use App\Models\Answer;
use App\Models\Question;
use Illuminate\Http\Request;

class AnswerController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     */
    public function index( $question_id)
    {
        $answers = Answer::where('question_id', $question_id)->get();
        return view('answers.index', compact('answers', 'question_id'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($question_id)
    {
        return view('answers.create', compact('question_id'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store($question_id,Request $request)
    {
        Answer::create($request->all() + ['question_id' => $question_id]);
        return redirect()->route('questions.answers.index', $question_id);
    }

    /**
     * Display the specified resource.
     */
    public function show(Answer $answer)
    {
        return view('answers.show', compact('country_id', 'city'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($question_id,Answer $answer)
    {
        return view('answers.edit', compact('question_id', 'answer'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update($question_id,Request $request, Answer $answer)
    {
        $answer->update($request->all());
        return redirect()->route('questions.answers.index', $question_id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($question_id, answer $answer)
    {
        $answer->delete();
        return redirect()->route('questions.answers.index', $question_id);
    }
}
