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

    public function home() {
        $post = Post::where('is_front_page', '1')->firstOrFail();

        return view('post.single')->with($post);
    }
}
