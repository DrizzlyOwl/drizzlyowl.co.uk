<?php

use App\Post;
use Illuminate\Database\Seeder;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Post::class, 10)->create();
        factory(Post::class, 'front-page', 1)->create();
        factory(Post::class, 'page', 5)->create();
    }
}
