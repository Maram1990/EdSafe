<form id="createQuestionForm" action="{{ route('questions.store') }}" method="POST" enctype="multipart/form-data">

                @csrf
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h1 class="modal-title fs-5" id="exampleModalLabel">اضافة سؤال جديد</h1>
                      <button class="pull-left " type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <strong>نص السؤال</strong>
                                    <input type="text" name="questiontext" class="form-control"  >
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <label for="imgpath" class="form-label"><strong>ختر صورةا</strong>
                                    <input class="form-control" type="file" name="imgpath" id="imgpath">
                                </label>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <label for="question_category_id"> <strong>نوع السؤال</strong>
                                    <select class="form-control" name="question_category_id" id="question_category_id">
                                        @foreach($questioncategories as $id => $entry)
                                            <option value="{{ $id }}" {{ old('question_category_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                        @endforeach
                                    </select>
                                    </label>
                                </div>
                            </div>
                            @if (old('question_category_id') === 2)
                            <div class="col-xs-12 col-sm-12 col-md-12">
                             <div class="form-group">
                                 <strong>نص السؤال</strong>
                                 <input type="text" name="questiontext" class="form-control"  >
                             </div>
                            </div>
                            @endif
                       </div>
                       <br>
                       <div class="modal-footer">
                         <button type="submit" id="saveQuestionBtn" class="btn btn-primary">حفظ</button>
                         <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">عودة</button>

                       </div>

                    </div>
                  </div>

                </div>
            </div>
        </form>


