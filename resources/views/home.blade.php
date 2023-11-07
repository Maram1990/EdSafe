@extends('layouts.app')

@section('content')
<br>
<br>


<div class="container col-lg-6  mx-auto mt-5">
    <div class="d-flex justify-content-center row">
        <div class="col-md-10 col-lg-10">
            @foreach ($questions as $question)
            <div class="border">


                <div class="question bg-white p-3 border-bottom">

                    <div class="d-flex flex-row align-items-center question-title">

                        <h5 class="mt-1 ml-2">{{$question->questiontext}}</h5>
                    </div>

                </div>
                <div class="question bg-white p-3 border-bottom">

                    <div class="d-flex flex-row   question-title">
                        <img  class="mx-auto d-block img-fluid"  src="/images/{{ $question->imgpath }}"  width="200px" >

                     </div>

                </div>

                <div class="question bg-white p-3 border-bottom">
                   @foreach ($question->answer as $answer )
                    <div class="answer @if ($answer->istrue) correct-answer @else wrong-answer @endif">
                    <label class="radio"> <input type="radio" name="ans" value="{{$answer->is_true}}" onchange="this.style.fontsize='35px'"> <span>{{$answer->title}}</span>
                    </label>
                    </div>
                    @endforeach
                </div>

                <div class="d-flex flex-row justify-content-between align-items-center p-3 bg-white">
                <button class="btn btn-primary d-flex align-items-center btn-danger" type="button">previous<i class="fa fa-angle-left mt-1 mr-1"></i></button>
                <button class="btn btn-primary border-success align-items-center btn-success" type="button">التالي<i class="fa fa-angle-right ml-2"></i></button></div>

            </div>
            <br>
            @endforeach
            <br>
        </div>
    </div>
</div>

@endsection
