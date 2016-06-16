<?php

use Illuminate\Support\Str;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

/**
 * User Factory
 */
$factory->define(App\User::class, function (Faker\Generator $faker) {
    return [
        'name' => 'Ash Davies',
        'email' => env('LOCAL_EMAIL'),
        'password' => bcrypt(env('LOCAL_PASS')),
        'remember_token' => str_random(10),
    ];
});

/**
 * Post Factory
 */
$factory->define(App\Post::class, function (Faker\Generator $faker) {
    $post_title = $faker->sentence(4);
    $post_content = $faker->paragraphs(5, 1);

    return [
        'post_title' => $post_title,
        'post_slug' => str_slug($post_title),
        'post_excerpt' => Str::words($faker->realText(200), 20),
        'post_content' => $post_content
    ];
});

/**
 * Page Factory
 */
$factory->define(App\Page::class, function (Faker\Generator $faker) {
    $post_title = $faker->words(3);
    $post_content = $faker->paragraphs(6, 1);

    return [
        'post_title' => $post_title,
        'post_slug' => str_slug($post_title),
        'post_excerpt' => Str::words($faker->realText(200), 20),
        'post_content' => $post_content
    ];
});

/**
 * Comment Factory
 */
$factory->define(App\Comment::class, function (Faker\Generator $faker) {

    return [
        'post_id' => $faker->numberBetween(1, 50),
        'comment_body' => $faker->sentences(5, true)
    ];
});