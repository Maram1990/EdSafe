<?php

namespace App\Http\Controllers;
use App\Models\Answer;
use App\Models\Question;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

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

        // Check if any answer is already marked as correct for this question
        $hasCorrectAnswer = Answer::where('question_id', $question_id)->where('istrue', true)->exists();

        if ($hasCorrectAnswer && $request->has('istrue')) {
            // Flash a warning message to the user
            Session::flash('message', 'لا يمكن اضافة اكتر من اجابة صحيحة');
            Session::flash('alert-class', 'alert-warning');

            return redirect()->back()->withInput();
        }


        Answer::create($request->all() + ['question_id' => $question_id]);
        return redirect()->route('questions.answers.index', $question_id);
    }

    /**
     * Display the specified resource.
     */
    public function show(Answer $answer)
    {
        return view('answers.show', compact('question_id', 'answers'));
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

        // Check if any answer is already marked as correct for this question
        $hasCorrectAnswer = Answer::where('question_id', $question_id)->where('istrue', true)->exists();

        if ($hasCorrectAnswer && $request->has('istrue')) {
            // Flash a warning message to the user
            Session::flash('message', 'لا يمكن اضافة اكتر من اجابة صحيحة');
            Session::flash('alert-class', 'alert-warning');

            return redirect()->back()->withInput();
        }

        $answer->update([

            'title' => $request->input('title'),
            'istrue' => $request->has('istrue') ? true : false
        ]);


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

    public function storemultipleanswers($question_id, Request $request)
{
    // Check if any answer is already marked as correct for this question
    $hasCorrectAnswer = Answer::where('question_id', $question_id)->where('istrue', true)->exists();

    if ($hasCorrectAnswer && $request->has('answers')) {
        // Flash a warning message to the user
        Session::flash('message', 'لا يمكن اضافة اكتر من اجابة صحيحة');
        Session::flash('alert-class', 'alert-warning');

        return redirect()->back()->withInput();
    }

    if ($request->has('answers')) {
        $correctAnswerFound = false;
        foreach ($request->input('answers') as $answerData) {
            $answer = new Answer();
            $answer->question_id = $question_id;
            $answer->title = $answerData['title'];
            $answer->istrue = isset($answerData['istrue']);
            $answer->save();

            if ($answer->istrue && !$correctAnswerFound) {
                $correctAnswerFound = true;
            } else {
                $answer->istrue = false;
                $answer->save();
            }
        }
    }
    //or//


    // Check if any answer is already marked as correct for this question
    $hasCorrectAnswer = Answer::where('question_id', $question_id)->where('istrue', true)->exists();

    if ($hasCorrectAnswer && $request->has('answers')) {
        $correctAnswersCount = collect($request->input('answers'))->where('istrue', true)->count();

        if ($correctAnswersCount > 1) {
            // Flash an error message to the user
            Session::flash('message', 'لا يمكن اضافة اكتر من اجابة صحيحة');
            Session::flash('alert-class', 'alert-danger');

            return redirect()->back()->withInput();
        }
    }

    if ($request->has('answers')) {
        $correctAnswerFound = false;
        foreach ($request->input('answers') as $answerData) {
            $answer = new Answer();
            $answer->question_id = $question_id;
            $answer->title = $answerData['title'];
            $answer->istrue = isset($answerData['istrue']);
            $answer->save();

            if ($answer->istrue && !$correctAnswerFound) {
                $correctAnswerFound = true;
            } else {
                $answer->istrue = false;
                $answer->save();
            }
        }
    }
    // in index blade
//@if(session('message'))
//    <div class="alert {{ session('alert-class') }}">
 //       {{ session('message') }}
 //   </div>
///@endif


    return redirect()->route('questions.answers.index', $question_id);
}

}
