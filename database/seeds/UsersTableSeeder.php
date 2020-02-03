<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => "golam robbani",
            'email' => 'golamrobbani29@gmail.com',
            'password' => Hash::make('password'),
            'remember_token'=> Str::random(10)
        ]);
    }
}
