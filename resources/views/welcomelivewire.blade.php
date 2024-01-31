@extends('layouts.responsive')
@section('content')

<br>
<br>


<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-11">
            <div class="card">
                <div class="card-header">
                    <h3>المنشورات</h3>
                </div>
                <div class="card-body  table-responsive">
                    @if (session()->has('message'))
                        <div class="alert alert-success">
                            {{ session('message') }}
                        </div>
                    @endif
                    @livewire('posts')

                </div>
            </div>
        </div>
    </div>
</div>
<br>
<br>

@endsection
