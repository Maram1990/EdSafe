@extends('questions.layout')
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>تعديل السؤال</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('questions.index') }}"> عودة</a>
            </div>
        </div>
    </div>



    <form action="{{ route('questions.update',$question->id) }}" method="POST">
        @csrf
        @method('PUT')

         <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>نص السؤال</strong>
                    <input type="text" name="questiontext" value="{{ $question->questiontext }}" class="form-control"  >
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <strong>اختر صورة</strong>
                    <input class="form-control" type="file" name="imgpath" id="imgpath">
                    <img src="/images/{{ $question->imgpath }}" width="300px">


              </div>


            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
              <button type="submit" class="btn btn-primary">حفظ</button>
            </div>
        </div>

    </form>
@endsection
