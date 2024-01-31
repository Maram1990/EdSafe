@extends('layouts.responsive')
@section('content')
<br>
<br>
<br>
<br>
<div class="row">
    <div class="col-lg-8 margin-tb">
        <div class="pull-left">
            <h2>اضافة جواب</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-secondary" href="{{ route('questions.index') }}"> عودة</a>

        </div>
    </div>
</div>
<br>
@if(Session::has('message'))
    <div class="alert  alert-danger " role="alert">
        {{ Session::get('message') }}
    </div>
@endif



<form action="{{ route('questions.answers.store', $question_id) }}" method="POST">
    @csrf

    <div class="row">
        <div class="col-xs-8 col-sm-8 col-md-8">
            <div class="form-group">
                <label for="title">الاجابة</label>
                <input type="text" name="title" class="form-control"  >
            </div>
        </div>
        <div class="form-group">
            <label for="istrue">صحيح</label><br>
            <input type="checkbox" name="istrue" value="1"  {{ old('istrue') }} >

        </div>
        <div class="col-xs-8 col-sm-8 col-md-8 ">
                <button type="submit" class="btn btn-primary">حفظ</button>
        </div>
    </div>

</form>
@endsection
