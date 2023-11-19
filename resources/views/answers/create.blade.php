@extends('questions.layout')
@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>اضافة جواب</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('questions.index') }}"> عودة</a>

        </div>
    </div>
</div>



<form action="{{ route('questions.answers.store', $question_id) }}" method="POST">
    @csrf

     <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">

        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <label for="title">الاجابة</label>
                <input type="text" name="title" class="form-control"  >
            </div>
        </div>
        <div class="form-group">
            <label for="istrue">صحيح</label><br>
            <input type="checkbox" name="istrue" value="1"  {{ old('istrue') }} >

        </div>

        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">حفظ</button>
        </div>
    </div>

</form>
@endsection
