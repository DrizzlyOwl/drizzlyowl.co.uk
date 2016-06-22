<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
        return view('admin.dashboard');
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
        return view('admin.create');
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
}
