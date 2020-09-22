@extends('layouts.app')

@section('content')
    <h1>Create Post</h1>

    {!! Form::open(['action'=>'PostsController@store', 'method'=>'POST', 'enctype' =>'multipart/form-data']) !!}

    <div class="form-group">
        {!! Form::label('title','Title:') !!}
        {!! Form::text('title', '', ['class'=>'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('slug','Slug:') !!}
        {!! Form::text('slug', '', ['class'=>'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('intro','Intro:') !!}
        {!! Form::text('intro', '', ['class'=>'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('body','Body:') !!}
        {!! Form::textarea('body', '', ['id'=>'article-ckeditor', 'class'=>'form-control', 'rows'=>'5']) !!}
    </div>

    <div class="form-group">

        {!! Form::file('cover_img')!!}
    </div>
    <div class="form-group">
        {!! Form::submit('Create Post', ['class'=>'btn btn-primary']) !!}
    </div>
    {!! Form::close() !!}
    <br><br><br>
@endsection
