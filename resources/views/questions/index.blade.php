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
        <div  class="pull-right">
            <a class="btn btn-success" href="{{ route('questions.create') }}" > إضافة سؤال جديد</a>

            <button  type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#exampleModal"> ajax </button>
            <!-- Modal -->
            @if($errors->any())
                          <ul>
                          @foreach($errors->all() as $error)
                          <li>{{$error}}</li>
                          @endforeach
                          </ul>
                        @endif
            <form action="{{ route('questions.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog ">
                  <div class="modal-content">
                    <div class="modal-header">

                      <h1 class="modal-title fs-5" id="exampleModalLabel">اضافة سؤال جديد</h1>
                      <button class="pull-left " type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">



                        <div class="row">
                        <div class="col-xs-8 col-sm-8 col-md-8">
                            <div class="form-group">
                                <strong>نص السؤال</strong>
                                <input type="text" name="questiontext" class="form-control"  >
                            </div>
                        </div>
                        <div class="col-xs-8 col-sm-8 col-md-8">
                            <label for="imgpath" class="form-label"><strong>ختر صورة</strong>
                                <input class="form-control" type="file" name="imgpath" id="imgpath">
                            </label>

                          </div>

                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">حفظ</button>
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">عودة</button>

                    </div>
                  </div>
                </div>
              </div>

        </div>
            </form>
        </div>


    </div>
</div>
<br>
<div class="row">
    <div class="col-lg-12 margin-tb">
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
                <a class="btn btn-primary" href="{{ route('questions.edit',$question->id) }}">ثيهفث</a>

                @csrf
                @method('DELETE')

                <button type="submit" class="btn btn-danger">حذف</button>
            </form>
        </td>
    </tr>
    @endforeach
</table>
    </div>
</div>

{!! $questions->links() !!}
@endsection
