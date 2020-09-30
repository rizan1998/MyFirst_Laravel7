@extends('Layouts.app')



@section('content')
<div class="container">
    <div class="col-md-8 mt-4">
        <div class="row">
            <div class="col-5">
                <h4>Create a new Article</h4>
                <hr>
            </div>
        </div>
        <form action="/article" method="post" enctype="multipart/form-data">
            @csrf
            <x-input field="title" label="title" type="text" placeholder="Input your Title Article" />
            <x-textarea field="subject" label="Subject" />
            <x-inputfile field="thumbnail" label="Thumbnail" />
            <button type="submit" class="btn btn-primary">Create now!</button>
        </form>
    </div>
</div>
@endsection