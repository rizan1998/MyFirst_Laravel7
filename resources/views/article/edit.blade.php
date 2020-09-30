@extends('Layouts.app')



@section('content')
<div class="container">
    <div class="col-md-8 mt-4">
        <div class="row">
            <div class="col-5">
                <h4>Edit Your An Article</h4>
                <hr>
            </div>
        </div>
        <form action="/article/{{$article->id}}" method="post" enctype="multipart/form-data">
            @csrf
            <!-- kasih tau dengan add method bahwa ini adalah method put -->
            @method('PUT')

            <x-input field="title" label="title" type="text" value="{{$article->title}}" />
            <div class="form-group">
                <label for="exampleFormControlTextarea1">Subject</label>
                <textarea class="form-control" name="subject" placeholder="Enter Your Subject" id="exampleFormControlTextarea1" rows="3">{{old('subject') ? old('subject') : $article->subject }}</textarea>
                @error('subject')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                <div class="mt-3">
                    @if($article->thumbnail)
                    <img src="/image/{{$article->thumbnail}}" width="150" alt="">
                    @else
                    <p>kamu belum punya thumbnail</p>
                    @endif
                </div>
            </div>

            <button type="submit" class="btn btn-info btn-sm">Create now!</button> <a href="/article/{{$article->title}}" class="btn btn-danger btn-sm">Cencel</a>
        </form>
    </div>
</div>
@endsection