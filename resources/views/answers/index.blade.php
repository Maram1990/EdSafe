@extends('layouts.responsive')
@section('content')
<br>
<br>
<br>
<br>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-11">
            <div class="card">
                <div class="card-header">
                    <h3>الأجوبة</h3>
                </div>
                <div class="card-body">
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div  class="pull-right">
            <a class="btn btn-secondary" href="{{ route('questions.index') }}">عودة للسؤال</a>
            <a class="btn btn-success" href="{{ route('questions.answers.create', $question_id) }}"> إضافة جواب جديد</a>
        </div>
    </div>
</div>
<br>
@if (session('success'))
<div class="alert alert-success" role="alert">
   {{ session ('success')}}

</div>
@endif
@if($errors->any())
  <ul class="alert alert-danger" role="alert">
    @foreach($errors->all() as $error)
      <li>{{$error}}</li>
    @endforeach
  </ul>
@endif
<br>
<div class="row">
    <div class="col-lg-12 margin-tb  table-responsive">
       <table class="table table-bordered ">
    <tr>
        <th>المعرف</th>
        <th>السؤال</th>
        <th>الجواب</th>
        <th>صحيح</th>
        <th width="200px">Action</th>
    </tr>
    @foreach ($answers as $answer)
    <tr>
        <td>{{ $answer->id }}</td>
        <td>{{ $answer->question->questiontext}} </td>
        <td>{{ $answer->title }}</td>
        <td>{{ $answer->istrue ? 'نعم' : 'لا' }} </td>

        <td>
            <form action="{{ route('questions.answers.destroy', [$answer->question_id, $answer->id]) }}" method="POST">





                <a class="btn btn-primary" href="{{ route('questions.answers.edit', [$answer->question_id, $answer->id]) }}">تعديل</a>

                @csrf
                @method('DELETE')

                <button type="submit" class="btn btn-danger" href="{{ route('questions.answers.destroy', [$answer->question_id, $answer->id]) }}">حذف</button>
            </form>
        </td>
    </tr>
    @endforeach
</table>
</div>
</div>

@endsection
