<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Validator;
use App\Post;
use App\Http\Requests;

class PostsController extends Controller
{

    public function __construct() {
        //
    }

    /**
     * Display a listing of the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $ppp = env('POSTS_PER_PAGE');
        $posts = Post::orderBy('created_at', 'desc')->paginate($ppp);

        return view('posts', [
            'posts' => $posts
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        return view('create-post');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            ['post_title' => 'required|max:255'],
            [
                'post_title.required' => 'The Post title is a required field',
                'post_title.max' => 'You have exceeded the maximum amount of characters for the Post title'
            ]
        );

        if ($validator->fails()) {
            return redirect('/create')
                ->withInput()
                ->withErrors($validator);
        }

        $post = new Post;
        $post->post_title = $request->post_title;
        $post->post_slug = str_slug($request->post_title, '-');
        $post->post_excerpt = $request->post_excerpt;
        $post->post_content = $request->post_content;
        $post->save();

        $request->session()->flash('success', 'Created post ' . $post->post_title . ' successfully!');

        return redirect('/');
    }

    /**
     * Display the specified resource.
     *
     * @param  string  $slug
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $post = Post::where('post_slug', $slug)->firstOrFail();
        $comments = $post->comments;
        foreach ( $comments as $comment ) {
            $comment->time_diff = (new Carbon($comment->created_at))->diffForHumans();
        }

        return view('posts', [
            'posts' => [$post],
            'comments' => $comments,
            'single' => 1
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  string  $slug
     * @return \Illuminate\Http\Response
     */
    public function edit($slug)
    {
        $post = Post::where('post_slug', $slug)->firstOrFail();

        return view('edit-post', [
            'post' => $post
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  string $slug
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $slug)
    {
        $post = Post::where('post_slug', $request->slug)->firstOrFail();

        $validator = Validator::make(
            $request->all(),
            ['post_title' => 'required|max:255'],
            [
                'post_title.required' => 'The Post title is a required field',
                'post_title.max' => 'You have exceeded the maximum amount of characters for the Post title'
            ]
        );

        if ($validator->fails()) {
            return redirect('/edit/' . $slug)
                ->withInput()
                ->withErrors($validator);
        }

        $post->post_title = $request->post_title;
        $post->post_slug = str_slug($request->post_title, '-');
        $post->post_content = $request->post_content;
        $post->save();

        $request->session()->flash('success', 'Updating ' . $post->post_title . ' was successful!');

        return redirect('/post/' . $post->post_slug);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param Post $post
     * @return mixed
     */
    public function destroy(Request $request, Post $post)
    {
        $title = $post->post_title;
        $post->delete();
        $request->session()->flash('success', "Deleted '{$title}' successfully");
        return redirect('/');
    }
}
