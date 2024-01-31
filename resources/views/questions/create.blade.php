@extends('layouts.responsive')
<br><br><br><br>
@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>اضافة سؤال جديد</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('questions.index') }}"> عودة</a>
        </div>
    </div>
</div>
@if (session('success'))
<div class="alert alert-success" role="alert">
   {{ session ('success')}}

</div>

@endif
@if($errors->any())
  <ul>
    @foreach($errors->all() as $error)
      <li>{{$error}}</li>
    @endforeach
  </ul>
@endif


<form  action="{{ route('questions.store') }}" method="POST" enctype="multipart/form-data">
    @csrf

     <div class="row">
        <div class="col-xs-8 col-sm-8 col-md-8">
            <div class="form-group">
                <strong>نص السؤال</strong>
                <input type="text" name="questiontext" class="form-control"  >
            </div>
        </div>

        <div class="col-xs-8 col-sm-8 col-md-8">
            <label for="imgpath" class="form-label">اختر صورة
                <input class="form-control" type="file" name="imgpath" id="imgpath">
            </label>

          </div>
          <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>نوع السؤال</strong>
                <label for="question_category_id"> k,u hgchg</label>
                <select class="form-control name=question_category_id" id="question_category_id">
                    @foreach($questioncategories as $id => $entry)
                        <option value="{{ $id }}" {{ old('question_category_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="col-xs-8 col-sm-8 col-md-8 text-center">
                <button type="submit" class="btn btn-primary">حفظ</button>
        </div>
    </div>

</form>


@endsection
