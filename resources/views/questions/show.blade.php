@extends('questions.layout')
@section('content')
<br>
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2> عرض السؤال </h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('questions.index') }}"> عودة</a>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="container   mx-auto mt-5">
            <div class="d-flex justify-content-center row">
                <div class="col-md-10 col-lg-10">
                    <div class="border">


                        <div class="question bg-white p-3 border-bottom">
                            <div class="d-flex flex-row align-items-center question-title">

                                <h4 class="mt-1 ml-2">{{$question->questiontext}}</h4>
                        </div>
                        <div class="question bg-white p-3 border-bottom">
                            <div class="d-flex flex-row align-items-center question-title">
                                <img  class="mx-auto d-block img-fluid"  src="puplic/assets/img/{{$question->imgpath}} " width="100px" >

                             </div>
                        </div>

                            <div class="question bg-white p-3 border-bottom">


                                @foreach ( $question->answer as $answer)


                                <div class="ans ml-2">

                                <li>{{$answer->title}}</li>

                                </div>
                                <br>
                               @endforeach
                            </div>
                    </div>

            </div>
        </div>


        <br>

        @endsection
