@extends('layouts.responsive')
@section('content')
<br>
<br>


    <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">
                    <h2>الأسئلة</h2>
                </div>
                <div class="card-body">
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div  class="pull-right">
            <a class="btn btn-success" href="{{ route('questions.create') }}" >  إضافة سؤال جديد</a>

            <button  type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#exampleModal"> ajax </button>
            <!-- Modal -->

        </div>


    </div>
</div>
<br>
@if (session('success'))
<div class="alert alert-success" role="alert">
   {{ session ('success')}}

</div>
@endif
<br>
<div class="row">
 <div class="col-lg-12 margin-tb">
    <table class="table table-bordered">
        <tr>
            <th>المعرف</th>
            <th>نص السؤال</th>
            <th>الصورة</th>
            <th width=320px;>Action</th>
        </tr>
        @foreach ($questions as $question)
        <tr>
            <td>{{ $question->id }}</td>
            <td>{{ $question->questiontext }}</td>
            <td> <img src="/image/{{ $question->imgpath }}" width="80px"></td>
            <td>

             <form action="{{ route('questions.destroy',$question->id) }}" method="POST">
                    <a class="btn btn-secondary" href="{{ route('questions.answers.index', $question->id) }}">الأجوبة</a>

                    <!-- <a class="btn btn-info" href="{{ route('questions.show',$question->id) }}">عرض</a>-->
                    <button  type="button" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#exampleModals{{$question->id}}"> عرض </button>
                    <!--<a class="btn btn-primary" href="{{ route('questions.edit',$question->id) }}">تعديل</a>-->
                    <button  type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModale{{$question->id}}"> تعديل </button>
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">حذف</button>
                    <button  type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModald{{$question->id}}"> deletajax </button>

                    @include('questions.showmodal')

            </form>




            </td>
            @include('questions.deletemodal')
        </tr>
            @include('questions.editmodal')


        @endforeach

    </table>
 </div>
</div>

{!! $questions->links() !!}

@include('questions.createmodal')
</div>
</div>
</div>
</div>
</div>


@endsection



