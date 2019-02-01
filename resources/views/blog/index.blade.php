@extends('main')

@section('title','Blog Zioma')

@section('content')

    @foreach ($posts as $post)
        <div class="row">
        <div class="col-md-8 col-md-offset-2">
                <h1>{{$post->title}}</h1>
                <p>{{$post->body}}</p>
        </div>
                <a href="{{route('blog.single',['post' => $post->slug])}}">Read More</a>
        <hr>
        </div>    
    @endforeach

@endsection
    