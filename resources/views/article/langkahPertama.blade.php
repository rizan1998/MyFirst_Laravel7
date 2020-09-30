@extends('Layouts.app')

@section('title', 'Home | List Article')

@section('content')
<div class="container mt-3">
    <div class="row">
        <div class="col-lg-12">
            <div class="title m-b-md">
                @foreach($dataArticle->chunk(3) as $dataAChunk)
                <div class="row">
                    @foreach($dataAChunk as $dataA)
                    <div class="card col mb-3 ml-1 mr-1">
                        <img src="/image/{{$dataA->thumbnail}}" class="card-img-top" alt="">
                        <div class=" card-body">
                            <div class="row  align-items-center justify-content-between">
                                <div class="col-lg-8">
                                    <p>
                                        <b>Title</b> = {{ucfirst($dataA['title'])}} ╰(*°▽°*)╯
                                    </p> <!-- {{$dataA->title}} juga bisa -->
                                    <p>deskripsi = {{ucfirst($dataA->subject)}}</p>
                                </div>
                                <div class="col-lg-4">
                                    <a href="/article/{{$dataA->slug}}" class="btn btn-primary stretched-link">See Detail</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
                @endforeach
            </div>

            <div>
                {{$dataArticle->links()}}
            </div>
        </div>
    </div>

    <!-- footer -->
    @include('Layouts.footer')
</div>


@endsection