<?php

use App\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(User::class, 1)->create([
            'name' => 'Ash Davies',
            'email' => env('LOCAL_EMAIL'),
            'password' => Hash::make(env('LOCAL_PASS')),
            'active' => 1
        ]);

        factory(User::class, 9)->create();
    }
}
