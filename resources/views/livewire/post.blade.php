<div>
    @if (session()->has('message'))
    <div class="alert alert-success">
        {{ session('message') }}
    </div>
@endif

@if($updateMode)
    @include('livewire.update')
@else
    @include('livewire.create')
@endif

<table class="table table-bordered mt-5">
    <thead>
        <tr>
            <th>#</th>
            <th>العنوان</th>
            <th>النص</th>
            <th width="150px">Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach($posts as $post)
        <tr>
            <td>{{ $post->id }}</td>
            <td>{{ $post->title }}</td>
            <td>{{ $post->content }}</td>
            <td>
            <button wire:click="edit({{ $post->id }})" class="btn btn-primary btn-sm">تعديل</button>
                <button wire:click="delete({{ $post->id }})" wire:confirm="Are you sure you want to delete this post?" class="btn btn-danger btn-sm">حذف</button>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
</div>
