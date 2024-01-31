<?php

namespace App\Http\Controllers;

use App\Models\Question;
use App\Models\Answer;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
       $questions = question::with(['answer'=>function($query){$query->inRandomOrder();}])->inRandomOrder()->limit(3)->get();
       return view('home',compact('questions'));
    }
    public function storeresult()
    {
        
    }


}
