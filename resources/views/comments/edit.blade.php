@extends('layouts.app')



@section('content')

    {!! Form::model( $comment ,['method'=>'PATCH','action'=>['CommentsController@update', $comment->id]]) !!}

    <div class="form-group">
        {!! Form::label('body','Edit Comment:') !!}
        {!! Form::text('body', null , ['class'=>'form-control']) !!}
    </div>
    <div class="row">
        <div class="form-group col-md-3">
            {!! Form::submit('Update Comment',['class'=>'btn btn-primary']) !!}
        </div>

        {!! Form::close() !!}

        <div class="col-md-3">
            {!! Form::open(['method'=>'DELETE','action'=>['CommentsController@destroy',$comment->id]]) !!}

            <div class="form-group">
                {!! Form::submit('Delete Comment',['class'=>'btn btn-danger']) !!}
            </div>

            {!! Form::close() !!}
        </div>
    </div>

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