<form>
    <div class="form-group">
        <label for="exampleFormControlInput1">العنوان</label>
        <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="ادخل عنوان المنشور" wire:model="title">
        @error('title') <span class="text-danger">{{ $message }}</span>@enderror
    </div>
    <br>
    <div class="form-group">
        <label for="exampleFormControlInput2">الوصف</label>
        <textarea class="form-control" id="exampleFormControlInput2" wire:model="content" placeholder="ادخل النص"></textarea>
        @error('content') <span class="text-danger">{{ $message }}</span>@enderror
    </div>
    <br>
    <button wire:click.prevent="store()" class="btn btn-success">حفظ</button>
</form>
