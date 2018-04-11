@extends('layouts.app')

@section('content')

    <h2>Edit Post :</h2>

    {!! Form::model($post ,['method'=>'PATCH','action'=>['PostsController@update', $post->id],'files'=>true]) !!}

    <div class="form-group">
        {!! Form::label('title','Title:') !!}
        {!! Form::text('title', null , ['class'=>'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('category_id','Category:') !!}
        {{--{!! Form::select('category_id',array(['1'=>'PHP' , '2' => 'Laravel' , '3'=>'JavaScript' ,'4'=>'Bootstrap' ]) ,null , ['class'=>'form-control']) !!}--}}

        {!! Form::select('category_id',$categories ,null , ['class'=>'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('photo_id','Photo:') !!}
        {!! Form::file('photo_id', null , ['class'=>'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('body','Body:') !!}
        {!! Form::textarea('body', null , ['class'=>'form-control', 'rows'=>3]) !!}
    </div>

    <div class="form-group">
        {!! Form::submit('create Post',['class'=>'btn btn-primary']) !!}
    </div>

    {!! Form::close() !!}

    @if(count($errors) > 0)
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{$error}}</li>
                @endforeach
            </ul>
        </div>

    @endif

@stop