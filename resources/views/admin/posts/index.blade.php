@extends('layouts.admin')




@section('content')

    <h2>Posts</h2>

    <h2>Users</h2>

    <table class="table">
        <thead>
        <tr>
            <th>Title</th>
            <th>ID</th>
            <th>User</th>
            <th>Category</th>
            <th>Photo</th>
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
                <td>{{$post->user->name}}</td>
                <td>{{$post->category_id}}</td>
                <td>{{$post->body}}</td>
                <td>{{$post->created_at->diffForHumans()}}</td>
                <td>{{$post->updated_at->diffForHumans()}}</td>
            </tr>

            @endforeach

        @endif

        </tbody>
    </table>

@stop