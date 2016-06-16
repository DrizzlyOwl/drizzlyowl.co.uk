<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class PagesController extends Controller
{

    public function __construct() {
        //
    }

    public function home() {
        $page = Page::where('id', 1);
        return view('page')->with($page);
    }
}
