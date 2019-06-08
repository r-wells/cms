@extends('layouts.admin')




@section('content')

    @if(Session::has('deleted_media'))
        <p class="bg-danger">{{session('deleted_media')}}</p>
    @endif

    <h2>Media</h2>

    <div class="row">
        <table class="table">
            <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Created</th>
            </tr>
            </thead>
            <tbody>
            @if($photos)
            
                @foreach($photos as $photo)

                    <tr>
                        <td>{{$photo->id}}</td>
                        <td><img height=50 src="{{$photo->file}}" alt=""></td>
                        <td>{{$photo->created_at ? $photo->created_at->diffForHumans() : 'no date'}}</td>
                        <td>
                            {!! Form::open(['method' => 'DELETE', 'action' => ['MediaController@destroy', $photo->id]]) !!}
                            {!! Form::submit('Delete Media', ['class'=>'btn btn-danger']) !!}
                            {!! Form::close() !!}
                        </td>
                    </tr>

                @endforeach

            @endif

            </tbody>
        </table>
    </div>

@stop