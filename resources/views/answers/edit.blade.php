@extends('layout.admin')
@section('content')

<form action="{{ route('questions.answers.update',[$answer->question_id, $answer->id]) }}" method="POST">
    @csrf
    @method('PUT')

     <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>الاجابة</strong>
                <input type="text" name="title" value="{{ $answer->title }}" class="form-control"  >
            </div>
        </div>
        <div class="form-group">
            <label for="istrue">صحيح</label><br>
            <input type="checkbox" name="istrue" id="istrue" value="1" {{ $answer->istrue ? 'checked' : '' }}>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
          <button type="submit" class="btn btn-primary">حفظ</button>
        </div>
    </div>

</form>

@endsection
