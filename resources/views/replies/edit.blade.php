@extends('layouts.app')



@section('content')

    {!! Form::model( $reply ,['method'=>'PATCH','action'=>['CommentRepliesController@update', $reply->id]]) !!}

    <div class="form-group">
        {!! Form::label('body','Edit Comment:') !!}
        {!! Form::text('body', null , ['class'=>'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::submit('Submit',['class'=>'btn btn-primary']) !!}
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