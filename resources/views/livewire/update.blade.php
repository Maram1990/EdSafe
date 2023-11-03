<form>
    <input type="hidden" wire:model="post_id">
    <div class="form-group">
        <label for="title">العنوان</label>
        <input type="text" class="form-control" id="title" placeholder="ادخل عنوان" wire:model="title">
        @error('title') <span class="text-danger">{{ $message }}</span>@enderror
    </div>
    <div class="form-group">
        <label for="content">النص</label>
        <textarea class="form-control" id="content" wire:model="content" placeholder="اخل نص"></textarea>
        @error('content') <span class="text-danger">{{ $message }}</span>@enderror
    </div>
    <button wire:click.prevent="update()" class="btn btn-dark">Update</button>
    <button wire:click.prevent="cancel()" class="btn btn-danger">Cancel</button>
</form>
