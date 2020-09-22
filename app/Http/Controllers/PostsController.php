<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;

class PostsController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth')->except('index', 'show');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = DB::table('posts')->paginate(3);
        return view('posts.index')->with('posts', $posts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'slug' => 'required',
            'cover_img' => 'image|nullable|max:1999'
        ]);

        //Handle File Upload
        if ($request->hasFile('cover_img')) {
            //Get fileName with extension
            $fileNameWithExtension = $request->file('cover_img')->getClientOriginalName();
            //Get fileName Only
            $fileName = pathinfo($fileNameWithExtension, PATHINFO_FILENAME);
            //Get file Extension
            $extension = $request->file('cover_img')->getClientOriginalExtension();
            //File Name To Store
            $fileNameToStore = $fileName . '_' . time() . '.' . $extension;
            //Upload Img
            $path = $request->file('cover_img')->storeAs('public/cover_images', $fileNameToStore);
        } else {
            $fileNameToStore = 'no_image.jpg';
        }

        $post = new Post();
        $post->title = $request->input('title');
        $post->slug = $request->input('slug');
        $post->intro = $request->input('intro');
        $post->body = $request->input('body');
        $post->cover_img = $fileNameToStore;
        $post->user_id = auth()->user()->id;
        $post->save();

        return redirect()->action('DashboardController@index');
//        return Redirect::route('posts.index');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        $comments = $post->comments()->get();
        $data = [
            'post' => $post,
            'comments' => $comments
        ];
        return view('posts.show')->with($data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        return view('posts.edit')->with('post', $post);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        $this->validate($request, [
            'title' => 'required',
            'slug' => 'required',
            'cover_img' => 'image|nullable|max:1999'
        ]);

        //Handle File Upload
        if ($request->hasFile('cover_img')) {
            //Get fileName with extension
            $fileNameWithExtension = $request->file('cover_img')->getClientOriginalName();
            //Get fileName Only
            $fileName = pathinfo($fileNameWithExtension, PATHINFO_FILENAME);
            //Get file Extension
            $extension = $request->file('cover_img')->getClientOriginalExtension();
            //File Name To Store
            $fileNameToStore = $fileName . '_' . time() . '.' . $extension;
            //Upload Img
            $path = $request->file('cover_img')->storeAs('public/cover_images', $fileNameToStore);
        }

        $post->title = $request->input('title');
        $post->slug = $request->input('slug');
        $post->intro = $request->input('intro');
        $post->body = $request->input('body');
        if ($request->hasFile('cover_img')) {
            $post->cover_img = $fileNameToStore;
        }
        $post->save();

        return redirect()->action('DashboardController@index');
//        return Redirect::route('posts.show', $post->slug);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        if ($post->cover_img != 'no_image.jpg') {
            //Delete image
            Storage::delete('public/cover_images/' . $post->cover_img);
        }

        $post->delete();
        return redirect()->action('DashboardController@index');
//        return Redirect::route('posts.index');
    }
}
