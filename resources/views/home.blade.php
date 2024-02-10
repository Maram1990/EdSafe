@extends('layouts.app')

@section('content')
<br>
<br>


<div class="container col-lg-6  mx-auto mt-5">
    <div class="d-flex justify-content-center row">
        <div class="quiz border pt-4 col-md-10 col-lg-10">

                @foreach ($questions as $question)
                <div class="border ">
                    <div class="question bg-white pt-8 p-3 border-bottom">
                        <div class="d-flex flex-row  question-title">
                            <h5 class="mt-1 ml-2">{{$question->questiontext}}</h5>
                        </div>
                    </div>
                    <div  class="question bg-white p-3 border-bottom">
                        <div class="d-flex flex-row   question-title">
                            <img  class="mx-auto d-block img-fluid"  src="/images/{{ $question->imgpath }}"  width="200px" >
                        </div>
                    </div>
                    <div  class="question bg-white p-3 border-bottom">
                       @foreach ($question->answer as $answer )
                        <div class="choose " onchange="check(this)" >
                        <label class="radio"> <input type="radio" name="ans" value="{{$answer->istrue}}"  > <span >{{$answer->title}}</span>
                        </label>
                        </div>
                        @endforeach
                    </div>

                </div>
                <br>
                @endforeach

            <!-- Button trigger modal -->
               <button id="resultButton" style="display: none" type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                النتيجة
               </button>
               <br>

            <!-- Modal -->
            <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header ">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Modal title</h1>
                  </div>
                  <div class="modal-body " id="scoreModalBody">
                    your score is:
                  </div>
                  <div class="modal-footer justify-content-center">
                    <a class="btn btn-primary" href="{{route('home')}}" role="button">إعادة امتحان</a>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                  </div>
                </div>
              </div>
            </div>
            <br>
        </div>
    </div>
</div>



<script>
    var score = 0;
    var answeredQuestionCount = 0;
    var questionContainer = document.querySelector('.quiz');
    var questionCount = questionContainer.getElementsByClassName('border').length;

    function check(obj) {
        if (obj.querySelector('input').value == 1) {
            obj.style.background = "lightgreen";
            score++;
            answeredQuestionCount++;
        } else {
            obj.style.background = "lightsalmon";

            var questionContainer = obj.closest('.border');
            var options = questionContainer.getElementsByClassName('choose');

            for (var i = 0; i < options.length; i++) {
                if (options[i].querySelector('input').value == 1) {
                    options[i].style.background = 'lightgreen';
                    break;
                }
            }
            answeredQuestionCount++;
        }

        var scoreModalBody = document.getElementById('scoreModalBody');

        if (answeredQuestionCount === questionCount) {
            resultButton.style.display = 'block';
            scoreModalBody.textContent = "Your score is: " + score;
            //if (questionCount !== answeredQuestionCount) {
            // resultButton.disabled = true; // Disable the button
             // resultButton.classList.add('button-disabled'); // Add the CSS class
             /*.button-disabled {
            /* Styles for the disabled or hidden state */
            //opacity: 0.5;
            //cursor: not-allowed;
            /* Add any other desired styles */
}
        }


</script>

@endsection
