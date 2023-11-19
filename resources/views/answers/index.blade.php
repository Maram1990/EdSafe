@extends('questions.layout')
@section('content')
<br>
<br>
<br>
<br>
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>الأجوبة</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-secondary" href="{{ route('questions.index') }}">عودة للسؤال</a>
            <a class="btn btn-success" href="{{ route('questions.answers.create', $question_id) }}"> إضافة جواب جديد</a>
        </div>
    </div>
</div>
<br>
<table class="table table-bordered">
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

@endsection
