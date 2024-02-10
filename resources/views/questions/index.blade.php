@extends('layouts.responsive')
@section('content')
<br>
<br>


    <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-11">
            <div class="card">
                <div class="card-header">
                    <h3>الأسئلة</h3>
                </div>
                <div class="card-body">
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div  class="pull-right">
            <a class="btn btn-success" href="{{ route('questions.create') }}" >  إضافة سؤال جديد</a>

            <button  type="button" class="btn btn-success  rounded-circle " data-bs-toggle="modal" data-bs-target="#exampleModal" ><i class="lni lni-plus"></i> </button>
            <!-- Modal -->
            @include('questions.createmodal')

        </div>

<br>
    </div>
</div>
@if (session('success'))
<div class="alert alert-success" role="alert">
   {{ session ('success')}}

</div>
@endif
@if($errors->any())
  <ul class="alert alert-danger" role="alert">
    @foreach($errors->all() as $error)
      <li>{{$error}}</li>
    @endforeach
  </ul>
@endif
<div class="row">
 <div class="col-lg-12 margin-tb  table-responsive">
    <table class="table table-bordered ">
        <tr>
            <th>#</th>
            <th>نص السؤال</th>
            <th>نوع السؤال</th>
            <th>الصورة</th>
            <th width=300px;>Action</th>
        </tr>
        @foreach ($questions as $question)
        <tr>
            <td>{{ $question->id }}</td>
            <td>{{ $question->questiontext }}</td>
            <td>{{ $question->questioncategory->name}}
            <td> <img src="/images/{{ $question->imgpath }}" width="70px" height="70px"></td>
            <td>

             <form action="{{ route('questions.destroy',$question->id) }}" method="POST">
                    <a class="btn btn-secondary" data-bs-toggle="tooltip" data-bs-placement="bottom" data-bs-title="الأجوبة" href="{{ route('questions.answers.index', $question->id) }}"><i class="lni lni-radio-button"></i> </a>

                    <!-- <a class="btn btn-info" href="{{ route('questions.show',$question->id) }}">عرض</a>-->
                    <button  type="button" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#exampleModals{{$question->id}}"><i class="lni lni-eye"></i></button>
                    <!--<a class="btn btn-primary" href="{{ route('questions.edit',$question->id) }}">تعديل</a>-->
                    <button  type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModale{{$question->id}}"> <i class="lni lni-pencil"></i></button>
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger"><i class="lni lni-trash-can"></i></button>
                    <button  type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModald{{$question->id}}"> حذف</button>

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
<div class="d-flex justify-content-center">
    {!! $questions->links() !!}

  <!--  to add additional parameter betwenn links and -> appends(['sort' => 'department']) -->

  <!-- to convert result to json we add addinal rout:/convert-to-json
    Route::get('/convert-to-json', function () {
    return App\Employee::paginate(5);
    });
   -->
</div>



</div>
</div>
</div>
</div>
</div>
<script>
    createQuestionForm.addEventListener('submit', function(e) {
 e.preventDefault();

 var formData = new FormData(createQuestionForm);

 fetch("{{ route('questions.store') }}", {
     method: 'POST',
     body: formData
 })
 .then(function(response) {
     if (response.ok) {
         $('#exampleModal').modal('hide');
         // Clear the form inputs
         createQuestionForm.reset();
         // Trigger the event to load the updated questions
         document.dispatchEvent(new Event('questionAdded'));
     } else {
         throw new Error('Error: ' + response.status);
     }
 })
 .catch(function(error) {
     console.log(error);
 })
 .finally(function() {
     // Manually close the modal
     var modalElement = document.getElementById('exampleModal');
     var modalInstance = bootstrap.Modal.getInstance(modalElement);
     modalInstance.hide();
 });
});

// Handle the AJAX response   for flash message it works but with blank page betwen
/*
success: function (response) {
        // Display the success message immediately
        if (response.message) {
            $('.alert-success').text('تمت إضافة السؤال بنجاح.').show();
        }

        // Close the modal or perform any other necessary actions
        $('#exampleModal').modal('hide');
    }  */
     </script>


@endsection



