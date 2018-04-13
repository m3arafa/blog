@extends('layouts.app')

@section('content')

    <?php
    $path = "/images/users/" . $user->photo->path;
    ?>
    <div class="row">
        <div class="col-md-12">
            <table class="table">
                <thead>
                <tr>
                    <th></th>
                    <th>Name</th>
                    <th>Email</th>

                </tr>
                </thead>
                <tbody>
                <tr>
                    <td><img height="150px" src="{{$path}}"></td>
                    <td>{{$user->name}}</td>
                    <td>{{$user->email}}</td>

                </tr>
                </tbody>
            </table>
        </div>
        {{--user control buttons--}}
        @if($user->id == Auth::user()->id)
            <div class="col-md-12 row">
                <div class="col-md-2">
                    <a href="{{$user->id}}/edit"><button class="btn btn-primary">Edit profile</button></a>
                </div>
                <div class="col-md-2">
                    <a><button class="btn btn-danger">Delete Profile</button></a>
                </div>
            </div>
        @endif

        {{--user last activities--}}
        <div class="col-md-12">
            <hr>
            <h2> Posts by : {{$user->name}}</h2>
            @if($userPosts)
                <div class="row">
                    @foreach($userPosts as $post)
                        <?php
                        $path = "/images/posts/" . $post->photo->path;
                        ?>
                        <div class="card mb-4 col-md-5" style="margin:25px">
                            {{--<img class="card-img-top" src="http://placehold.it/750x300" alt="Card image cap">--}}
                            <img class="card-img-top" src="{{$path}}" alt="Card image cap">
                            <div class="card-body">
                                <h2 class="card-title">{{ $post->title }}</h2>
                                <p class="card-text">{{str_limit($post->body, 200)}}</p>
                                <a href="/post/{{$post->slug}}" class="btn btn-primary">Read More &rarr;</a>
                            </div>
                            <div class="card-footer text-muted">
                                <div class="row">
                                    <div class="col col-md-4">
                                        {{$post->created_at->diffForHumans()}}
                                    </div>
                                    <div class="col col-md-4">
                                        writer : <a href="/user/{{$post->user->id}}">{{$post->user->name}}</a>
                                    </div>
                                    <div class="col col-md-4">
                                        category : {{$post->category->name}}
                                    </div>
                                </div>


                            </div>
                        </div>
                    @endforeach
                </div>
            @endif
        </div>
    </div>


@stop