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
use Lavary\Menu\Menu;

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
     * Pages
     */
    Route::get('/admin/pages', 'AdminController@pages');

    /**
     * Posts
     */
    Route::get('/admin/posts', 'AdminController@posts');

    /**
     * Comments
     */
    Route::get('/admin/comments', 'AdminController@comments');

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



/**
 * Application menu
 */
(new Menu)->make('AdminNavigation', function($menu){

//    $menu->add('title', ['action' => 'Controller@method']);

    $menu->add('Dashboard', [
        'action' => 'AdminController@dashboard',
        'class' => 'list__item'
    ])
    ->prepend('<i class="fa fa-fw fa-dashboard"></i>');

    $menu->add('Posts', [
        'action' => 'AdminController@posts',
        'class' => 'list__item'
    ])
    ->prepend('<i class="fa fa-fw fa-pencil"></i>');

    $menu->add('Pages', [
        'action' => 'AdminController@pages',
        'class' => 'list__item'
    ])
    ->prepend('<i class="fa fa-fw fa-file"></i>');

    $menu->add('Comments', [
        'action' => 'AdminController@comments',
        'class' => 'list__item'
    ])
    ->prepend('<i class="fa fa-fw fa-comment"></i>');

});
