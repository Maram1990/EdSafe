@extends('questions.layout')
@section('content')
<br>
<br>
<br>
<br>
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>الأسئلة</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-success" href="{{ route('questions.create') }}"> إضافة سؤال جديد</a>
        </div>
    </div>
</div>
<br>
<table class="table table-bordered">
    <tr>
        <th>المعرف</th>
        <th>نص السؤال</th>
        <th>مسار الصورة</th>
        <th width=320px;>Action</th>
    </tr>
    @foreach ($questions as $question)
    <tr>
        <td>{{ $question->id }}</td>
        <td>{{ $question->questiontext }}</td>
        <td>{{ $question->imgpath }}</td>
        <td>
            <form action="{{ route('questions.destroy',$question->id) }}" method="POST">

                <a class="btn btn-secondary" href="{{ route('questions.answers.index', $question->id) }}">الأجوبة</a>

                <a class="btn btn-info" href="{{ route('questions.show',$question->id) }}">عرض</a>

                <a class="btn btn-primary" href="{{ route('questions.edit',$question->id) }}">تعديل</a>

                @csrf
                @method('DELETE')

                <button type="submit" class="btn btn-danger">حذف</button>
            </form>
        </td>
    </tr>
    @endforeach
</table>

{!! $questions->links() !!}
@endsection
