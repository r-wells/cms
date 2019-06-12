@extends('layouts.admin')


@section('content')

    @if(count($replies) > 0)
    <h2>replies</h2>
    <table class="table">
        <thead>
        <tr>
            <th>ID</th>
            <th>Post</th>
            <th>Author</th>
            <th>Email</th>
            <th>Body</th>
        </tr>
        </thead>
        <tbody>
        
            @foreach($replies as $reply)

            <tr>
                <td>{{$reply->id}}</td>
                <td>{{$reply->post_id}}</td>
                <td>{{$reply->author}}</td>
                <td>{{$reply->email}}</td>
                <td>{{$reply->body}}</td>
                <td><a href="{{route('home.post', $reply->comment->post->id)}}">View Comment</a></td>
                <td>
                @if($reply->is_active == 1)
                    {!! Form::open(['method'=>'PATCH', 'action' => ['CommentRepliesController@update', $reply->id]]) !!}

                    <input type="hidden" name="is_active" value="0">

                    <div class="form-group">
                        {!! Form::submit('Unapprove reply', ['class' => 'btn btn-primary']) !!}
                    </div>

                    {!! Form::close() !!}

                @else

                    {!! Form::open(['method'=>'PATCH', 'action' => ['CommentRepliesController@update', $reply->id]]) !!}

                    <input type="hidden" name="is_active" value="1">

                    <div class="form-group">
                        {!! Form::submit('Approve reply', ['class' => 'btn btn-primary']) !!}
                    </div>

                    {!! Form::close() !!}

                @endif
                </td>
                <td>
                {!! Form::open(['method'=>'DELETE', 'action' => ['CommentRepliesController@destroy', $reply->id]]) !!}

                <div class="form-group">
                    {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                </div>

                {!! Form::close() !!}
                </td>
            </tr>

            @endforeach



        @else

            <h2>No replies</h2>

        @endif

        </tbody>
    </table>

@stop