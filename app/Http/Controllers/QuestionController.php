<?php

namespace App\Http\Controllers;

use App\Models\Question;
use App\Models\QuestionCategory;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse; //important for ajax

class QuestionController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index()
    {
        $questions = Question::with('questioncategory')->latest()->paginate(6);
        $questioncategories = QuestionCategory::pluck('name', 'id'); //very important to add this becuse my create is on modal
        return view('questions.index',compact('questions','questioncategories'));
    }



    public function create()
    {

        $questioncategories = QuestionCategory::pluck('name','id');

        return view('questions.create',compact('questioncategories'));
    }



    public function store(Request $request): JsonResponse
    {
        $request->validate([
            'questiontext' => 'required',
           /* 'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:1024',**/
        ]
    );

    $input = $request->all();

        if ($imgpath = $request->file('imgpath')) {
            $destinationPath = 'images/';
            $profileImage = date('YmdHis') . "." . $imgpath->getClientOriginalExtension();
            $imgpath->move($destinationPath, $profileImage);
            $input['imgpath'] = "$profileImage";
        }

       $question=Question::create($input);


       return response()->json(['message' => 'Question saved successfully']);

    //return redirect()->route('questions.index')->with('success','q created successfully.');

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


        $input = $request->all();

        if ($imgpath = $request->file('imgpath')) {
            $destinationPath = 'images/';
            $profileImage = date('YmdHis') . "." . $imgpath->getClientOriginalExtension();
            $imgpath->move($destinationPath, $profileImage);
            $input['imgpath'] = "$profileImage";
        }else{
            $input['imgpath'] = $question->imgpath; // Retain the existing image path

            // unset($input['image']);
        }

        $question->update($input);

        return redirect()->route('questions.index')->with('success','تم تعديل السؤال بنجاح');

    }



    public function destroy(Question $question)
    {
        $question->delete();
        if (request()->ajax()) {
            return response()->json(['success' => true]);
        }

        return redirect()->route('questions.index')->with('success', 'تم حذف السؤال بنجاح');
    }
}
