<?php

namespace App\Http\Controllers;
use App\Models\Answer;
use App\Models\Question;
use Illuminate\Http\Request;

class AnswerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $answers=answer::with('question')->get();
        return view('answers.index',compact('answers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('answers.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store($question_id,Request $request)
    {
        $request->validate([
            'question_id' => 'required',
            'title' => 'required',

        ]);

        answer::create($request->all());

        return redirect()->route('answers.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Answer $answer)
    {
        return view('answers.show',compact('answer'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Answer $answer)
    {
        return view('answers.edit',compact('answer'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Answer $answer)
    {
        $validated = $request->validate([
            'title'=>'required',
        ]);

        $answer->update($request->all());
        $answer->update($validated);

        return redirect()->route('answers.index')->with('success','تم تعديل  بنجاح');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Answer $answer)
    {
        $answer->delete();
        return redirect()->route('answers.index')->with('success','a deleted successfully');
    }
}
