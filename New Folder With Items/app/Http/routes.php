<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

use App\Post;
use Illuminate\Http\Request;

// ====== Public ===== //

/**
 * Show Home Page
 */
Route::get('/', 'PagesController@home');

/**
 * Show all Posts
 */
Route::get('/blog', 'PostsController@index');

/**
 * Show single Post
 */
Route::get('/blog/{slug}', 'PostsController@show');

// ====== Private ===== //

Route::group(['middleware' => 'auth'], function() {
    /**
     * Edit single Post
     */
    Route::get('/edit/{slug}', 'PostsController@edit');

    /**
     * Update a single Post
     */
    Route::post('/update/{slug}', 'PostsController@update');

    /**
     * Construct a new Post
     */
    Route::get('/create', 'PostsController@create');

    /**
     * Create New Post
     */
    Route::post('/store', 'PostsController@store');

    /**
     * Delete Post
     */
    Route::delete('/delete/{post}', 'PostsController@destroy');
});

Route::auth();