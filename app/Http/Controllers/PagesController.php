<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Http\Requests;

class PagesController extends Controller
{

    protected $post_type;

    public function __construct() {
        $this->post_type = "page";
    }

    public function home(Request $request) {
        $post = Post::where([
            ['is_front_page', 1],
            ['post_type', $this->post_type]
        ])->firstOrFail();

        return view('public.page.front', ['post' => $post]);
    }

    public function view(Request $request) {
        $posts = Post::where([
            ['post_type', $this->post_type]
        ]);

        return view('public.post.archive', ['posts' => $posts]);
    }
}
