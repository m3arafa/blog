@extends('layouts.app')

@section('content')
    <!-- Post Content Column -->
    @if($post)
        <div>

            <!-- Title -->
            <h2 class="mt-4">{{$post->title}}</h2>

            <!-- Author -->
            <p class="lead">
                by
                <a href="/user/{{$post->user_id}}">{{$post->user->name}}</a>
            </p>

            <hr>
            <div class="row">
                <div class="col col-md-4">
                    <!-- Date/Time -->
                    <p>Posted from : {{$post->created_at->diffForHumans()}}</p>
                </div>
                <div class="col col-md-4">
                    {{-- Category --}}
                    <p>Category : {{$post->category->name}}</p>
                </div>
                <div class="col col-md-4">
                    {{-- Edit Post --}}
                    @if(Auth::user())
                        @if($post->user->id == Auth::user()->id)
                            <a href="{{$post->id}}/edit">
                                <button class="btn btn-default">Edit Post</button>
                            </a>
                        @endif
                    @endif

                </div>

            </div>


            <hr>
        <?php
        $path = "/images/posts/" . $post->photo->path;
        ?>

        <!-- Preview Image -->
            <img class="img-fluid rounded"
                 src={{$path ? $path : "http://placehold.it/900x300"}} alt="">

            <hr>

            <!-- Post Content -->
            <p class="lead">{{$post->body}}</p>

            <hr>

            <!-- Comments Form -->


            <div class="card my-4">
                <h5 class="card-header">Leave a Comment:</h5>
                @if(Auth::user())
                    <div class="card-body">
                        {!! Form::open(['method'=>'POST','action'=>'CommentsController@store']) !!}

                        <input type="hidden" name="post_id" value="{{$post->id}}">

                        <div class="form-group">
                            {!! Form::textarea('body', null , ['class'=>'form-control' , 'rows'=>3]) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::submit('Submit',['class'=>'btn btn-primary']) !!}

                        </div>

                        {!! Form::close() !!}
                    </div>
                @else
                    <div class="card-body">
                        <h3>Please <a href="/login">login</a> to make a comment and replies</h3>
                    </div>

                @endif
            </div>

            <!-- Single Comment -->
            @if($comments)
                @foreach($comments as $comment)
                    <div class="media mb-4">
                        <div class="col-md-1">
                            <img class="d-flex mr-3 rounded" height="35px" src="/images/users/{{$comment->photo}}"
                                 alt="">
                        </div>

                        <div class="media-body col-md-10">
                            <h5 class="mt-0">{{$comment->user->name}}
                                @if(Auth::user())
                                    @if(Auth::user()->id == $comment->user_id)
                                        <a href="comment/{{$comment->id}}/edit">
                                            <button class="btn-sm btn-primary">Edit</button>
                                        </a>
                                    @endif
                                @endif
                            </h5>
                            <p>{{$comment->body}}</p>


                            {{--Display Comment Replies --}}

                            <?php
                            $replies = $comment->replies;
                            ?>

                            @if(count($replies)  > 0 )
                                @foreach($replies as $reply)

                                    <div class="media row">
                                        <img class="d-flex mr-3 rounded" height="35px"
                                             src="/images/users/{{$reply->photo}}" alt="">
                                        <div class="media-body col-md-10">
                                            <h5 class="mt-0">{{$reply->user->name}}</h5>
                                            <p>{{$reply->body}}</p>
                                        </div>
                                        @if(Auth::user())
                                            @if(Auth::user()->id == $reply->user_id)
                                                <div class="col-md-2 row">
                                                    <div class="col-md-6">
                                                        <a href="comment/replies/{{$reply->id}}/edit">
                                                            <button class="btn-sm btn-primary">Edit</button>
                                                        </a>
                                                    </div>
                                                    <div class="col-md-6">
                                                        {!! Form::open(['method'=>'DELETE','action'=>['CommentRepliesController@destroy',$reply->id]]) !!}

                                                        <div class="form-group">
                                                            {!! Form::submit('Delete',['class'=>'btn-sm btn-danger']) !!}
                                                        </div>

                                                        {!! Form::close() !!}
                                                    </div>

                                                </div>
                                            @endif
                                        @endif

                                    </div>

                                @endforeach

                            @endif




                            {{--comment Reply form--}}
                            @if(Auth::user())
                                <div>
                                    {!! Form::open(['method'=>'POST','action'=>'CommentRepliesController@store']) !!}

                                    <input type="hidden" name="comment_id" value="{{$comment->id}}">

                                    <div class="form-group row">
                                        <div class="col-md3">
                                            {!! Form::submit('Reply',['class'=>'btn btn-primary']) !!}
                                        </div>
                                        <div class="col-md-9">
                                            {!! Form::textarea('body', null , ['class'=>'form-control' , 'rows'=>1]) !!}
                                        </div>

                                    </div>

                                    {!! Form::close() !!}
                                </div>

                            @endif
                        </div>

                    </div>


                @endforeach
            @endif

        </div>
    @else
        <h2>Post Not found</h2>
    @endif
@stop