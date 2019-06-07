@extends('layouts.admin')




@section('content')

    @if(Session::has('deleted_post'))
        <p class="bg-danger">{{session('deleted_post')}}</p>

    @elseif(Session::has('updated_post'))
        <p class="bg-success">{{session('updated_post')}}</p>

    @elseif(Session::has('created_post'))
        <p class="bg-success">{{session('created_post')}}</p>
    @endif

    <h2>Posts</h2>

    <h2>Users</h2>

    <table class="table">
        <thead>
        <tr>
            <th>Photo</th>
            <th>Title</th>
            <th>ID</th>
            <th>User</th>
            <th>Category</th>
            <th>Body</th>
            <th>Created</th>
            <th>Updated</th>
        </tr>
        </thead>
        <tbody>
        @if($posts)
        
            @foreach($posts as $post)

            <tr>
                <td><img height="100" src="{{$post->photo ? $post->photo->file : 'http://placehold.it/400'}}" alt=""></td>
                <td>{{$post->title}}</td>
                <td>{{$post->id}}</td>
                <td><a href="{{route('admin.posts.edit', $post->id)}}">{{$post->user->name}}</a></td>
                <td>{{$post->category ? $post->category->name : 'Uncategorized'}}</td>
                <td>{{str_limit($post->body, 30)}}</td>
                <td>{{$post->created_at->diffForHumans()}}</td>
                <td>{{$post->updated_at->diffForHumans()}}</td>
            </tr>

            @endforeach

        @endif

        </tbody>
    </table>

@stop