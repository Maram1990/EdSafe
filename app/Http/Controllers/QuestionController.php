<?php

namespace App\Http\Controllers;

use App\Models\Question;
use Illuminate\Http\Request;

class QuestionController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $questions = Question::latest()->paginate(12);
        return view('questions.index',compact('questions'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('questions.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'questiontext' => 'required',
           /* 'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',**/
        ]
    );
  /* $newimg = uniqid().'-'.$request->questiontext.'.'.$request->imgpath->extension();
    $destinationPath = '/puplic/assets/img/';
    $request->imgpath->move($destinationPath, $newimg);*/
    $input = $request->all();

        if ($imgpath = $request->file('imgpath')) {
            $destinationPath = 'images/';
            $profileImage = date('YmdHis') . "." . $imgpath->getClientOriginalExtension();
            $imgpath->move($destinationPath, $profileImage);
            $input['imgpath'] = "$profileImage";
        }

       Question::create($input);




   /* if ($imgpath = $request->file('image')) {
        $destinationPath = 'puplic/assets/img/';
        $profileImage = $imgpath->getClientOriginalExtension();
        $imgpath->move($destinationPath, $profileImage);
        $question['imgpath'] = "$profileImage";
    }*/


  /* Question::create([
        'questiontext'=>$request->input('questiontext'),
        'imgpath'=> $newimg,

    ]);
    /*$input = $request->all();

        if ($imgpath = $request->file('image')) {
            $destinationPath = 'images/';
            $profileImage = date('YmdHis') . "." . $imgpath->getClientOriginalExtension();
            $imgpath->move($destinationPath, $profileImage);
            $input['image'] = "$profileImage";
        }

        Question::create($input);*/
    return redirect()->route('questions.index')->with('success','q created successfully.');

    }

    /**
     * Display the specified resource.
     */
    public function show(Question $question)
    {
        return view('questions.show',compact('question'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Question $question)
    {
      return view('questions.edit',compact('question'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Question $question)
    {
        $validated = $request->validate([
            'questiontext'=>'required',

        ]);

         /**$company->fill($request->post())->save();ذحاح
          *

         */
        /*   fault by maram
        $question->update($request->all());
        $question->update($validated);*/
        $input = $request->all();

        if ($imgpath = $request->file('imgpath')) {
            $destinationPath = 'images/';
            $profileImage = date('YmdHis') . "." . $imgpath->getClientOriginalExtension();
            $imgpath->move($destinationPath, $profileImage);
            $input['imgpath'] = "$profileImage";
        }else{
            unset($input['imgpath']);
        }

        $question->update($input);

        return redirect()->route('questions.index')->with('success','تم تعديل السؤال بنجاح');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Question $question)
    {
        $question->delete();
        return redirect()->route('questions.index')->with('success','q deleted successfully');
    }
}
