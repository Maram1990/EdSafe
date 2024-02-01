<form action="{{ route('questions.update',$question->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="modal fade" id="exampleModale{{$question->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
          <div class="modal-content">
            <div class="modal-header">

              <h1 class="modal-title fs-5" id="exampleModalLabel">تعديل السؤال</h1>
              <button class="pull-left " type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                <strong>نص السؤال</strong>
                <input type="text" name="questiontext" value="{{ $question->questiontext }}" class="form-control"  >
                </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                <strong>اختر صورة</strong>
                <input class="form-control" type="file" name="imgpath" id="imgpath">
                <img class="img-fluid" src="/images/{{ $question->imgpath }}" width="300px">
                </div>
              </div>
              <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <label for="question_category_id"> <strong>نوع السؤال</strong> </label>
                    <select class="form-control" name="question_category_id" id="question_category_id">
                        @foreach($questioncategories as $id => $entry)
                            <option value="{{ $id }}" {{ (old('question_category_id') ? old('question_category_id') : $questions->question_category_id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
           </div>

           <div class="modal-footer">
              <button type="submit" class="btn btn-primary">حفظ</button>
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">عودة</button>
           </div>
          </div>
        </div>
    </div>

</form>
