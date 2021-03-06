<?php

use App\Post;
use App\Comment;
use App\User;
use Faker\Generator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

/**
 * User Factory
 */
$factory->define(User::class, function (Generator $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->email,
        'password' => Hash::make(str_random(10)),
        'remember_token' => str_random(10),
        'active' => 0
    ];
});

/**
 * Post Factory
 */
$factory->define(Post::class, function (Generator $faker) {
    $post_title = $faker->sentence(4);
    $post_content = $faker->paragraphs(5, 1);

    return [
        'post_title' => $post_title,
        'post_slug' => str_slug($post_title),
        'post_excerpt' => Str::words($faker->realText(200), 20),
        'post_content' => $post_content,
        'post_type' => 'post',
        'post_image' => $faker->imageUrl('1200', '600'),
        'is_front_page' => 0
    ];
});

$factory->defineAs(Post::class, 'page', function (Generator $faker) use ($factory) {
    $post = $factory->raw(Post::class);

    return array_merge($post, ['post_type' => 'page']);
});

$factory->defineAs(Post::class, 'front-page', function (Generator $faker) use ($factory) {
    $post = $factory->raw(Post::class);

    return array_merge($post, ['post_type' => 'page', 'is_front_page' => 1]);
});

/**
 * Comment Factory
 */
$factory->define(Comment::class, function (Generator $faker) {

    return [
        'post_id' => $faker->numberBetween(1, 15),
        'comment_body' => $faker->sentences(5, true)
    ];
});