@extends('questions.layout')
<main id="main">
<br>
<br>
<br>
<br>

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>تعديل السؤال</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('questions.index') }}"> عودة</a>
            </div>
            <br>
        </div>
    </div>

<div class="container justify-content-center">

    <form action="{{ route('questions.update',$question->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

         <div class="row">
            <div class="col-xs-8 col-sm-8 col-md-8">
                <div class="form-group">
                    <strong>نص السؤال</strong>
                    <input type="text" name="questiontext" value="{{ $question->questiontext }}" class="form-control"  >
                </div>
            </div>
            <div class="col-xs-8 col-sm-8 col-md-8">
                <label for="imgpath" class="form-label"><strong>ختر صورةا</strong>
                        <input class="form-control" type="file" name="imgpath" id="imgpath">
                </label>
                    <img src="/images/{{ $question->imgpath }}" width="300px">


              </div>


            <div class="pull-right">
              <button type="submit" class="btn btn-primary">حفظ</button>
            </div>
        </div>

    </form>
</div>
</main>
@endsection
