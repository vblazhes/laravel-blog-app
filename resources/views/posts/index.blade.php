@extends('layouts.app')

@section('content')
    @if(count($posts) > 0)
        <ul class="list-group">
            @foreach($posts as $post)
                <li class="list-group-item">
                    <div class="row">
                        <div class="col-md-4 col-sm-4">
                            <img style="width: 100%" src="/storage/cover_images/{{ $post->cover_img }}">
                        </div>
                        <div class="col-md-8 col-sm-8">

                            <h3><a href="{{ route('posts.show', $post->slug) }}">{{ $post->title }}</a></h3>
                            <small>Written on {{ $post->created_at }}</small>
                        </div>
                    </div>
                </li>
                <br>
            @endforeach
            {{ $posts->links() }}
        </ul>
    @else
        <p>No posts found!</p>
    @endif
    <br><br><br>
@endsection

