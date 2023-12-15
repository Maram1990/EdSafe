<form action="{{ route('questions.destroy',$question->id) }}" method="POST">
    @csrf
    @method('DELETE')
    <div class="modal fade" id="exampleModald{{$question->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-sm" role="document">
          <div class="modal-content">
            <div class="modal-header">

              <h1 class="modal-title fs-5" id="exampleModalLabel">عرض السؤال</h1>
              <button class="pull-left " type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>هل انت متأكد من حذف السؤال</strong>
                        </div>
                    </div>
<button type="submit" class="btn btn-danger">نعم</button>
<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">لا</button>
</form>
