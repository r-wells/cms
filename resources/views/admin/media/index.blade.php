@extends('layouts.admin')




@section('content')

    @if(Session::has('deleted_category'))
        <p class="bg-danger">{{session('deleted_category')}}</p>
    @endif

    <h2>Categories</h2>

    <div class="col-sm-6">
        {!! Form::open(['method'=>'POST', 'action' => 'AdminCategoriesController@store']) !!}
        <h3 style="font-weight: bold;">Create Category By Name</h3>
        <div class="form-group">
            {!! Form::label('name', 'Name: ') !!}
            {!! Form::text('name', null, ['class' => 'form-control']) !!}
        </div>

        <div class="form-group">    
            {!! Form::submit('Create Category', ['class' => 'btn btn-primary']) !!}
        </div>

        {!! Form::close() !!}
    </div>

    <div class="col-sm-6">
        <h3 style="font-weight: bold;">Current Categories</h3>
        <table class="table">
            <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Created</th>
            </tr>
            </thead>
            <tbody>
            @if($categories)
            
                @foreach($categories as $category)

                    <tr>
                        <td>{{$category->id}}</td>
                        <td><a href="{{route('admin.categories.edit', $category->id)}}">{{$category->name}}</a></td>
                        <td>{{$category->created_at ? $category->created_at->diffForHumans() : 'no date'}}</td>
                    </tr>

                @endforeach

            @endif

            </tbody>
        </table>
    </div>

@stop