<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class CommentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Post $post)
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Post $post)
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Post $post)
    {

        $this->validate($request, [
           'comment'=>'required'
        ]);

        $comment = new Comment();
        $comment->comment = $request->input('comment');
        $comment->slug = '';
        $comment->user_id = auth()->user()->id;
        $comment->post_id = $post->id;
        $comment->save();

        $tmp_comment = Comment::find($comment->id);
        $tmp_comment->slug = 'comment-'.$comment->id;
        $tmp_comment->save();

        return Redirect::route('posts.show', $post->slug);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post, Comment $comment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post, Comment $comment)
    {
        $data=[
          'post'=>$post,
          'comment'=>$comment
        ];

        return view('comments.edit')->with($data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post, Comment $comment)
    {
        $this->validate($request, [
           'comment'=>'required'
        ]);

        $comment->comment = $request->input('comment');
        $comment->save();

        return Redirect::route('posts.show',$post->slug);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post, Comment $comment)
    {
        $comment->delete();

        return Redirect::route('posts.show',$post->slug);
    }
}
