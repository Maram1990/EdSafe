<?php

namespace App\Http\Controllers;

use App\Models\Question;
use Illuminate\Http\Request;
use App\Models\QuestionCategory;
use Illuminate\Support\Facades\Session;
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
       Session::flash('success', 'تمت إضافة السؤال بنجاح.');

       return response()->json(['success' => true]);

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


        if ($imgpath = $request->file('imgpath')) {
            // Delete the existing image from the "images" folder
            $existingImagePath = public_path('images/' . $question->imgpath);
            if (file_exists($existingImagePath)) {
                unlink($existingImagePath);
            }

            // Save the new image
            $destinationPath = 'images/';
            $profileImage = date('YmdHis') . "." . $imgpath->getClientOriginalExtension();
            $imgpath->move($destinationPath, $profileImage);
            $input['imgpath'] = $profileImage;
        } else {
            $input['imgpath'] = $question->imgpath; // Retain the existing image path
        }

        $question->update($input);

        return redirect()->route('questions.index')->with('success','تم تعديل السؤال بنجاح');

    }



    public function destroy(Question $question)
    {
        // Delete the associated image from the "images" folder
    $imagePath = public_path('images/' . $question->imgpath);
    if ($question->imgpath && file_exists($imagePath) && is_file($imagePath)) {
        unlink($imagePath);
    }

    $question->delete();

    if (request()->ajax()) {
        return response()->json(['success' => true]);
    }

    return redirect()->route('questions.index')->with('success', 'تم حذف السؤال بنجاح');
    }
}
