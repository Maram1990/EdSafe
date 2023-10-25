@extends('layout.admin')
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





     <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <label for="question_id">رقم السؤال</label>
                <input type="number" name="question_id" class="form-control"  >
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <label for="title">الاجابة</label>
                <input type="text" name="title" class="form-control"  >
            </div>
        </div>
        <div class="form-group">
            <label for="istrue">Active</label><br>
            <input type="checkbox"  {{ $answer->istrue ? 'checked' : '' }}/>
        </div>


    </div>


@endsection
