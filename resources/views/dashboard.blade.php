@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <a href="{{ route('posts.create') }}" class="btn btn-info" style="color: white;float: right">Create Post</a>
                        <h2>Your Blog Posts!</h2>
                </div>
                <table class="table table-striped">
                    <tr>
                        <th></th>
                        <th>Title</th>
                        <th></th>
                        <th></th>
                    </tr>
                    @foreach($posts as $post)
                        <tr>
                            <td style="width: 200px"><img style="width: 100%" src="/storage/cover_images/{{ $post->cover_img }}"></td>
                            <td>{{ $post->title }}</td>
                            <td><a href="{{ route('posts.edit', $post->slug)  }}" class="btn btn-secondary">Edit</a></td>
                            <td>
                                {!! Form::open(['action'=>['PostsController@destroy', $post], 'method'=>'POST']) !!}
                                {!! Form::hidden('_method','DELETE') !!}
                                {!! Form::submit('Delete',['class' =>'btn btn-danger']) !!}
                                {!! Form::close() !!}
                            </td>
                        </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
</div>
    <br><br><br><br>
@endsection
