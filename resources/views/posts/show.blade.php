@extends('layouts.app')

@section('content')
    <h1>{{ $post->title }}</h1>
    <h3><i>{{ $post->intro }}</i></h3>
    <div class="text-center">
        @if($post->cover_img != 'no_image.jpg')
            <img style="width: 50%" src="/storage/cover_images/{{ $post->cover_img }}">
        @endif
    </div>
    <br>
    <p>{!! $post->body !!}</p>
    <hr>
    <h3 style="display: inline">Comments:</h3>
    <small style="display: inline" class="pull-right">Written on {{ $post->created_at }}
        by {{ $post->user->name }}</small>
    @if(count($comments)>0)
        <ul class="list-group">
            @foreach($comments as $comment)
                <li class="list-group-item" style="margin-bottom: 5px">
                    <b>{{ $comment->user->name }}:</b>
                    <br>
                    <span>&nbsp&nbsp&nbsp{{ $comment->comment }}</span>
                    @if(!Auth::guest())
                        @if($comment->user->name == auth()->user()->name)
                            <span style="float: right; margin-left: 5px">
                                <form action="{{ route('posts.comments.destroy',[$post->slug, $comment->slug]) }}" method="post">
                                    {{ csrf_field() }}
                                    <input type="hidden" name="_method" value="DELETE">
                                    <input type="submit" value="Delete" class="btn btn-danger">
                                </form>
                            </span>
                            <span style="float: right"><a href="{{ route('posts.comments.edit',[$post->slug,$comment->slug]) }}" class="btn btn-secondary">Edit</a></span>
                        @endif
                    @endif
                </li>
            @endforeach
        </ul>
    @else
        <p>No comments for the post!</p>
    @endif
    @if(!Auth::guest())
        <br>
        <h3>Leave a comment:</h3>
        {!! Form::open(['action'=>['CommentsController@store', $post], 'method'=>'POST']) !!}

        <div class="form-group">
            {!! Form::label('comment','Leave a Comment:') !!}
            {!! Form::textarea('comment', '', ['class'=>'form-control', 'rows'=>5]) !!}
        </div>
        <div class="form-group">
            {!! Form::submit('Submit', ['class'=>'btn btn-primary']) !!}
        </div>
        {!! Form::close() !!}
    @endif
    <br><br><br><br>
@endsection
