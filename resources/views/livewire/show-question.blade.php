<div>

    <div class="container col-lg-6  mx-auto mt-5">
        <div class="d-flex justify-content-center row">
            <div class="col-md-10 col-lg-10">
                @foreach ($questions as $question)
                <div class="border">


                    <div class="question bg-white p-3 border-bottom">

                        <div class="d-flex flex-row align-items-center question-title">

                            <h5 class="mt-1 ml-2">{{$question->questiontext}}</h5>
                        </div>

                    </div>
                    <div class="question bg-white p-3 border-bottom">

                        <div @click="alert('Hello World!')" class="d-flex flex-row   question-title">
                            <img  class="mx-auto d-block img-fluid"  src="/images/{{ $question->imgpath }}"  width="200px" >

                         </div>

                    </div>

                    <div  class="question bg-white p-3 border-bottom">
                       @foreach ($question->answer as $answer )
                        <div class="choose" onchange="bigger(this)" >
                        <label class="radio"> <input type="radio" name="ans" value="{{$answer->istrue}}" > <span >{{$answer->title}}</span>
                        </label>
                        </div>
                        @endforeach
                    </div>

                    <div class="d-flex flex-row justify-content-between align-items-center p-3 bg-white">

                    <button class="btn btn-primary border-success align-items-center btn-success" type="button">التالي<i class="fa fa-angle-right ml-2"></i></button></div>

                </div>
                <br>
                @endforeach

                <br>
            </div>
        </div>
    </div>
    <script>
        function bigger(obj) {
            if((obj.querySelector('input').value)==1 ){
               obj.style.background = "lightgreen";
            }
            else{
               obj.style.background = "lightsalmon";

            var options = document.getElementsByClassName('choose');


                for (var i = 0; i < options.length  ; i++) {
                    if (options[i].querySelector('input').value == 1) {
                        options[i].style.background = 'lightgreen';
                        break;
                    }
                }


            }




        }
        </script>


</div>
