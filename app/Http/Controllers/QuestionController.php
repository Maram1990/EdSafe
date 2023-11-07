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
     

    public function index()
    {
        $questions = Question::latest()->paginate(12);
        return view('questions.index',compact('questions'));
    }

   

    public function create()
    {
        return view('questions.create');
    }

     

    public function store(Request $request)
    {
        $request->validate([
            'questiontext' => 'required',
           /* 'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',**/
        ]
    );
  
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

    
    

    public function show(Question $question)
    {
        return view('questions.show',compact('question'));
    }

    
    

    public function edit(Question $question)
    {
      return view('questions.edit',compact('question'));
    }

    
    

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

    

    public function destroy(Question $question)
    {
        $question->delete();
        return redirect()->route('questions.index')->with('success','q deleted successfully');
    }
}
