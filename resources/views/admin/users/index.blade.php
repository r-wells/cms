@extends('layouts.admin')



@section('content')

    @if(Session::has('deleted_user'))
        <p class="bg-danger">{{session('deleted_user')}}</p>

    @elseif(Session::has('updated_user'))
        <p class="bg-success">{{session('updated_user')}}</p>

    @elseif(Session::has('created_user'))
        <p class="bg-success">{{session('created_user')}}</p>
    @endif

    <h2>Users</h2>

    <table class="table">
        <thead>
        <tr>
            <th>ID</th>
            <th>Photo</th>
            <th>Name</th>
            <th>Email</th>
            <th>Role</th>
            <th>Created</th>
            <th>Updated</th>
            <th>Status</th>
        </tr>
        </thead>
        <tbody>
        @if($users)
        
            @foreach($users as $user)

            <tr>
                <td>{{$user->id}}</td>
                <td><img height="50" src="{{$user->photo ? $user->photo->file : 'http://placehold.it/400'}}" alt=""></td>
                <td><a href="{{route('admin.users.edit', $user->id)}}">{{$user->name}}</a></td>
                <td>{{$user->email}}</td>
                <td>{{$user->role->name}}</td>
                <td>{{$user->created_at->diffForHumans()}}</td>
                <td>{{$user->updated_at->diffForHumans()}}</td>
                <td>{{$user->is_active == 1 ? 'Active' : 'Not Active'}}</td>
            </tr>

            @endforeach

        @endif

        </tbody>
    </table>

@stop