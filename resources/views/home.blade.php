@extends('layouts.app')

@section('content')
    <div class="container">
        {{--<h1 class="my-4">Page Heading--}}
        {{--<small>Secondary Text</small>--}}
        {{--</h1>--}}
        @if(Auth::user())
            <h2><a href="post/create">Create New Post</a></h2>
            @else
            <h3>please login to create new post</h3>
        @endif
        <hr>

        <!-- Blog Post -->
        @if($posts)
            <div class="row">
                @foreach($posts as $post)
                    <?php
                    $path = "/images/posts/" . $post->photo->path;
                    ?>
                    <div class="card mb-4 col-md-5" style="margin:25px">
                        {{--<img class="card-img-top" src="http://placehold.it/750x300" alt="Card image cap">--}}
                        <img class="card-img-top" src="{{$path}}" alt="Card image cap">
                        <div class="card-body">
                            <h2 class="card-title">{{ $post->title }}</h2>
                            <p class="card-text">{{str_limit($post->body, 200)}}</p>
                            <a href="post/{{$post->id}}" class="btn btn-primary">Read More &rarr;</a>
                        </div>
                        <div class="card-footer text-muted">
                            <div class="row">
                                <div class="col col-md-4">
                                    {{$post->created_at->diffForHumans()}}
                                </div>
                                <div class="col col-md-4">
                                    writer : <a href="/user/{{$post->user_id}}">{{$post->user->name}}</a>
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


    <!-- Pagination -->
        <ul class="pagination justify-content-center mb-4">
            <li class="page-item">
                <a class="page-link" href="#">&larr; Older</a>
            </li>
            <li class="page-item disabled">
                <a class="page-link" href="#">Newer &rarr;</a>
            </li>
        </ul>

    </div>

@stop
