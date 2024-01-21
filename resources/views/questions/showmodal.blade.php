<div class="modal fade" id="exampleModals{{$question->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">

            <div class="modal-header">
              <h1 class="modal-title fs-5" id="exampleModalLabel">عرض السؤال</h1>
              <button class="pull-left " type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body">
            <div class="row">
                <div class="container   mx-auto mt-5">
                    <div class="d-flex justify-content-center row">
                    <div class="col-md-12 col-lg-12">
                        <div class="border">

                              <div class="question bg-white p-3 border-bottom">
                                <div class="d-flex flex-row align-items-center question-title">

                                          <h4 class="mt-1 ml-2">{{$question->questiontext}}</h4>
                                </div>
                                <div class="question bg-white p-3 border-bottom">
                                    <div class="d-flex flex-row align-items-center question-title">
                                        <img  class="mx-auto d-block img-fluid"  src="/images/{{ $question->imgpath }}"  width="200px" >
                                    </div>
                                </div>

                                <div class="question bg-white p-3 ">
                                          @foreach ( $question->answer as $answer)
                                          <div class="ans ml-2">
                                          <li>{{$answer->title}}</li>
                                          </div>
                                          <br>
                                          @endforeach
                                </div>
                              </div>

                        </div>

                    </div>
                    </div>
                </div>
            </div>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">عودة</button>
            </div>
      </div>
    </div>
</div>
