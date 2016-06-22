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
     * Dashboard
     */
    Route::get('/admin', 'AdminController@dashboard');

    /**
     * Edit single Post
     */
    Route::get('/admin/edit/{slug}', 'AdminController@edit');

    /**
     * Update a single Post
     */
    Route::post('/admin/update/{slug}', 'AdminController@update');

    /**
     * Construct a new Post
     */
    Route::get('/admin/create', 'AdminController@create');

    /**
     * Create New Post
     */
    Route::post('/admin/store', 'AdminController@store');

    /**
     * Delete Post
     */
    Route::delete('/admin/delete/{post}', 'AdminController@destroy');
});

Route::auth();