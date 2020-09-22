@extends('layouts.app')

@section('content')
    <h1>Edit Comment</h1>
    <form action="{{ route('posts.comments.update',[$post->slug,$comment->slug]) }}" method="POST">
        {{ csrf_field() }}
        <input type="hidden" name="_method" value="PUT">
        <label for="comment">Comment Text:</label>
        <textarea id="comment" name="comment" rows="5" class="form-control">{{ $comment->comment }}</textarea>
        <br>
        <input type="submit" value="Update" class="btn btn-primary">
    </form>
@endsection
