@extends('layouts.app')

@section('content')
    <h1>Create Post</h1>

    {!! Form::open(['action'=>['PostsController@update', $post], 'method'=>'POST', 'enctype' =>'multipart/form-data']) !!}


    <div class="form-group">
        {!! Form::label('title','Title:') !!}
        {!! Form::text('title', $post->title, ['class'=>'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('slug','Slug:') !!}
        {!! Form::text('slug', $post->slug, ['class'=>'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('intro','Intro:') !!}
        {!! Form::text('intro', $post->intro, ['class'=>'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('body','Body:') !!}
        {!! Form::textarea('body', $post->body, ['id'=>'article-ckeditor', 'class'=>'form-control', 'rows'=>'5']) !!}
    </div>
    <div class="form-group">

        {!! Form::file('cover_img')!!}
    </div>
    <div class="form-group">
        {!! Form::hidden('_method','PUT') !!}
        {!! Form::submit('Update Post', ['class'=>'btn btn-primary']) !!}
    </div>
    {!! Form::close() !!}
    <br><br><br>
@endsection
