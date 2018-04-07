@extends('layouts.app')


@section('content')

    <div class="row ">
        <div class="col-md-2"></div>
        <div class="col-md-8">

            <img class="img img-responsive img-rounded" height="150px" src="/images/users/{{$user->photo->path}}">

            <h3>Edit Profile :</h3>

            {!! Form::model( $user ,['method'=>'PATCH','action'=>['UsersController@update', $user->id],'files'=>true]) !!}

            <div class="form-group">
                {!! Form::label('name','Name:') !!}
                {!! Form::text('name', null , ['class'=>'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('email','Email:') !!}
                {!! Form::email('email', null , ['class'=>'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('role_id','Role:') !!}
                {!! Form::select('role_id', $roles , ['class'=>'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('password','Enter New Password:') !!}
                {!! Form::password('password', null, ['class'=>'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('photo_id','New Profile Picture:') !!}
                {!! Form::file('photo_id', null , ['class'=>'form-control']) !!}
            </div>


            <div class="form-group">
                {!! Form::submit('Update',['class'=>'btn btn-primary']) !!}
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


        </div>

    </div>


@stop