@extends('layouts.responsive')
<br>
@section('content')
<br>
<br>
<br>
<br>
<br>
@if(Session::has('message'))
    <div class="alert  alert-danger " role="alert">
        {{ Session::get('message') }}
    </div>
@endif
<form action="{{ route('questions.answers.update',[$answer->question_id, $answer->id]) }}" method="POST">
    @csrf
    @method('PUT')


     <div class="row justify-content-center ">
        <div class="col-xs-8 col-sm-8 col-md-8 ">
            <div class="form-group">
                <strong>الاجابة</strong>
                <input type="text" name="title" value="{{ $answer->title }}" class="form-control"  >
            </div>
        </div>
        <div class="col-xs-8 col-sm-8 col-md-8 ">
            <label for="istrue">صحيح</label><br>
            <input type="checkbox" name="istrue" id="istrue" value="1"  {{ ($answer->istrue==1 ? 'checked' : '' )}}>
        </div>
        <br>
        <br>

        <div class="col-xs-8 col-sm-8 col-md-8 ">
          <button type="submit" class="btn btn-primary">حفظ</button>
        </div>
    </div>

</form>

@endsection
