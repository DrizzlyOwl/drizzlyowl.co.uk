<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Post;
use App\Http\Requests;

class PostsController extends Controller
{

    protected $post_type;

    public function __construct() {
        $this->post_type = "post";
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

        return view('public.post.archive', [
            'posts' => $posts
        ]);
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

        return view('public.post.single', [
            'post' => $post,
            'comments' => $comments
        ]);
    }

}
