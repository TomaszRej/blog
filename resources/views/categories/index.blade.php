@extends('main')
@section('title', 'categories')
    
@section('content')

<div class="row">
    <div class="col-md-8">
        <table class="table">
            <thead>
                <tr>
                <th>#</th>
                <th>Name</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($categories as $category)
                    <tr>
                    <th>{{$category->id}}</th>
                    <td>{{$category->name}}</td>
                    </tr>
                @endforeach
            </tbody>
        
        </table>
    </div>
    <div class="col-md-3">
        <div class="card">
            {!!Form::open(['route'=>'categories.store'])!!}
                {{Form::label('name','Name: ')}}
                {{Form::text('name', null, ['class' => 'form-control'])}}
                {{Form::submit( 'Submit' ,['class'=>'btn btn-success'])}} 
            {!!Form::close()!!}
        </div>
    </div>
</div>


@endsection