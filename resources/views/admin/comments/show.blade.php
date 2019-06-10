@extends('layouts.admin')


@section('content')

    @if(count($comments) > 0)
    <h2>Comments</h2>
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
        
            @foreach($comments as $comment)

            <tr>
                <td>{{$comment->id}}</td>
                <td>{{$comment->post_id}}</td>
                <td>{{$comment->author}}</td>
                <td>{{$comment->email}}</td>
                <td>{{$comment->body}}</td>
                <td><a href="{{route('home.post', $comment->post_id)}}">View Post</a></td>
                <td>
                @if($comment->is_active == 1)
                    {!! Form::open(['method'=>'PATCH', 'action' => ['PostsCommentsController@update', $comment->id]]) !!}

                    <input type="hidden" name="is_active" value="0">

                    <div class="form-group">
                        {!! Form::submit('Unapprove Comment', ['class' => 'btn btn-primary']) !!}
                    </div>

                    {!! Form::close() !!}

                @else

                    {!! Form::open(['method'=>'PATCH', 'action' => ['PostsCommentsController@update', $comment->id]]) !!}

                    <input type="hidden" name="is_active" value="1">

                    <div class="form-group">
                        {!! Form::submit('Approve Comment', ['class' => 'btn btn-primary']) !!}
                    </div>

                    {!! Form::close() !!}

                @endif
                </td>
                <td>
                {!! Form::open(['method'=>'DELETE', 'action' => ['PostsCommentsController@destroy', $comment->id]]) !!}

                <div class="form-group">
                    {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                </div>

                {!! Form::close() !!}
                </td>
            </tr>

            @endforeach



        @else

            <h2>No Comments</h2>

        @endif

        </tbody>
    </table>

@stop