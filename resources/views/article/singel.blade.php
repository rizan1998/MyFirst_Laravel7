@extends('Layouts.app')



@section('content')
<div class="container mt-3">
    <div class="row">
        <div class="col-lg-8">
            <div class="card" style="width: 18rem;">
                <div class="card-body pr-5">
                    <div class="row">
                        <div class="col-lg-8">
                            <h5 class="card-title">{{$article->title}}</h5>
                            <p class="card-text">{{$article->subject}}</p>
                            <a href="/article" class="card-link btn btn-primary">Back to list Article</a>
                        </div>
                        <div class="col-lg-4">
                            <div class="btn-group" role="group" aria-label="Button group with nested dropdown">
                                <div class="btn-group" role="group">
                                    <button id="btnGroupDrop1" type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Action
                                    </button>
                                    <div class="dropdown-menu text-center" aria-labelledby="btnGroupDrop1">
                                        <a class="dropdown-item bg-waring" href="/article/{{$article->id}}/edit">Edit Article</a>
                                        <form action="/article/{{$article->id}}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button class="dropdown-item bg-danger" href="">Delete</button>
                                        </form>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('Layouts.footer')
</div>
@endsection