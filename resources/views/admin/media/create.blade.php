@extends('layouts.admin')

@section('styles')

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/4.3.0/min/dropzone.min.css">

@stop

@section('content')

    <h2>Upload Media</h2>

    <div class="row">
        {!! Form::open(['method'=>'POST', 'action' => 'MediaController@store', 'class'=>'dropzone']) !!}


        {!! Form::close() !!}
</div>

@stop

@section('scripts')

    <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/4.3.0/min/dropzone.min.js"></script>

@stop