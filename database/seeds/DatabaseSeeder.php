<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    protected $toTruncate = ['users', 'posts', 'comments'];
    
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        foreach ( $this->toTruncate as $table ) {
            DB::table($table)->truncate();
        }

        $this->call(CommentsTableSeeder::class);
        $this->call(PostsTableSeeder::class);
        $this->call(UserTableSeeder::class);
    }
}