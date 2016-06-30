<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use App\Post;
use App\Comment;
use App\Http\Requests;

class AdminController extends Controller
{
    /**
     * Show the admin dashboard
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function dashboard(Request $request) {
        $posts = Post::all()->groupBy('post_type')->toArray();
        if ( !array_key_exists('post', $posts) ) {
            $posts["post"] = [];
        }
        if ( !array_key_exists('page', $posts) ) {
            $posts["page"] = [];
        }
        $comments = Comment::all()->count();
        return view('admin.dashboard', ['posts' => $posts, 'comment_count' => $comments]);
    }

    public function pages(Request $request) {
        $posts = Post::where('post_type', 'page')->orderBy('post_title')->get();
        return view('admin.pages', ['posts' => $posts]);
    }

    public function posts(Request $request) {
        $posts = Post::where('post_type', 'post')->orderBy('created_at', 'desc')->get();
        return view('admin.posts', ['posts' => $posts]);
    }

    public function comments(Request $request) {
        $comments = Comment::select('comment_body', 'post_id', 'created_at')->orderBy('post_id')->get();
        $posts = [];
        foreach ( $comments as $i => $comment ) {
            $associated_posts = Post::select('post_title')->where('id', $comment->post_id)->value('post_title');
            $posts[$comment->post_id]["post_title"] = $associated_posts;
            $posts[$comment->post_id]["comments"][] = ["created_at" => $comment->created_at, "body" => $comment->comment_body];
        }
        return view('admin.comments', ['posts' => $posts]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  string  $slug
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        $post = Post::where('post_slug', $request->slug)->firstOrFail();

        return view('admin.edit', [
            'post' => $post
        ]);
    }

    /**
     * Show the form for creating a new post/page
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        return view('admin.create', [
            'post_type' => $request->post_type
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
            return redirect('admin/edit/' . $post->post_slug)
                ->withInput()
                ->withErrors($validator);
        }

        $post->post_title = $request->post_title;
        $post->post_slug = str_slug($request->post_title, '-');
        $post->post_content = $request->post_content;
        $post->save();

        $request->session()->flash('success', 'Updating "' . $post->post_title . '" was successful!');

        return redirect('admin/edit/' . $post->post_slug);
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
        Comment::where('post_id', $post->id)->delete();
        $post->delete();
        $request->session()->flash('success', "Deleted '{$title}' successfully");
        return back();
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
        $post->post_type = $request->post_type;
        $post->save();

        $request->session()->flash('success', 'Created ' . $post->post_type . ' ' . $post->post_title . ' successfully!');

        return redirect('admin/edit/' . $post->post_slug);
    }
}
