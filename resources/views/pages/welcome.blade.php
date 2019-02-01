@extends('main')
@section('title', '- Home' )
@section('content')
          <div class="row">
              <div class="col">
                <div class="jumbotron">
                        <h1 class="display-4">Welcome to my blog</h1>
                        <p class="lead">It uses utility classes for typography and spacing to space content out within the larger container.</p>
                        <a class="btn btn-primary btn-lg" href="#" role="button">Popular posts</a>
                </div>
              </div>
          </div>
          <div class="row">
            <div class="col-md-8">
                @foreach ($posts as $post)
                    <div class="post">
                        <h2>{{$post->title}}</h2>
                        <p>{{$post->body}}</p>    
                    <a href="{{url('blog/'.$post->slug)}}" class="btn btn-primary">Read more</a>
                    </div>
                    <hr>
                @endforeach
     
         
            <div class="col-md-3 col-md-offset-1">
<h2>SIDE BAR</h2>
            </div>
          </div>
@endsection

    