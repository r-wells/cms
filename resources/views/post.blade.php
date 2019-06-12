@extends('layouts.blog-post')


@section('content')
    <h2>Post</h2>

            <!-- Blog Post -->

        <!-- Title -->
        <h1>{{$post->title}}</h1>

        <!-- Author -->
        <p class="lead">
            by <a href="#">{{$post->user->name}}</a>
        </p>

        <hr>

        <!-- Date/Time -->
        <p><span class="glyphicon glyphicon-time"></span> Posted {{$post->created_at->diffForHumans()}}</p>

        <hr>

        <!-- Preview Image -->
        <img class="img-responsive" src="{{$post->photo->file}}" alt="">

        <hr>

        <!-- Post Content -->
        <p class="lead">{{$post->body}}</p>

        <hr>

        @if(Session::has('comment_created'))
        <p class="bg-primary">{{session('comment_created')}}</p>

        @elseif(Session::has('reply_created'))
        <p class="bg-primary">{{session('reply_created')}}</p>
        @endif

@if(Auth::check())

        <!-- Comments Form -->
        <div class="well">
            <h4>Leave a Comment:</h4>

                {!! Form::open(['method'=>'POST', 'action' => 'PostsCommentsController@store']) !!}

                <input type="hidden" name="post_id" value="{{$post->id}}">

                <div class="form-group">
                    {!! Form::label('body', 'Content: ') !!}
                    {!! Form::textarea('body', null, ['class' => 'form-control', 'rows'=>3]) !!}
                </div>

                <div class="form-group">
                    {!! Form::submit('Submit Comment', ['class' => 'btn btn-primary']) !!}
                </div>

                {!! Form::close() !!}

        </div>
@endif

        <hr>

        <!-- Posted Comments -->
@if(count($comments) > 0)
        <!-- Comment -->
        @foreach($comments as $comment)
                <div class="media">
                    <a class="pull-left" href="#">
                        <img height=64 class="media-object" src="{{$comment->photo}}" alt="">
                    </a>
                    <div class="media-body">
                        <h4 class="media-heading">{{$comment->author}}
                            <small>{{$comment->created_at->diffForHumans()}}</small>
                        </h4>
                        <p>{{$comment->body}}</p>
                        @if(count($comment->replies) > 0)

                            <h5><strong>Replies to {{$comment->author}}:</strong></h5>
                        @foreach($comment->replies as $reply)
                            @if($reply->is_active == 1)
                                <!-- Comment Replies -->
                                <div class="media">
                                    <a class="pull-left" href="#">
                                        <img height=64 class="media-object" src="{{$reply->photo}}" alt="">
                                    </a>
                                    <div class="media-body">
                                        <h4 class="media-heading">{{$reply->author}}
                                            <small>{{$reply->created_at}}</small>
                                        </h4>
                                        <p>{{$reply->body}}</p>
                                    </div>
                                </div>
                            @else
                                <h5>No Replies</h5>
                            @endif
                        @endforeach
                    </div>
                @endif

                <!-- Comment Reply Form -->
                        {!! Form::open(['method'=>'POST', 'action' => 'CommentRepliesController@createReply']) !!}

                            <input type="hidden" name="comment_id" value="{{$comment->id}}">

                            <div class="form-group">
                                {!! Form::label('body', 'Leave A Reply: ') !!}
                                {!! Form::textarea('body', null, ['class' => 'form-control', 'rows'=>2]) !!}
                            </div>

                            <div class="form-group">
                                {!! Form::submit('Submit Reply', ['class' => 'btn btn-primary']) !!}
                            </div>

                        {!! Form::close() !!}
                </div>

        @endforeach
@endif


@stop

@section('scripts')

    <!-- <script>
        $('.comment-reply-container.toggle-reply').click(function(){
            $(this).next().slideToggle("slow");
        });
    </script> -->

@stop