<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new \App\Models\User();
        $user->name = "admin";
        $user->email = "admin@book.com ";
        $user->password = \Illuminate\Support\Facades\Hash::make("12345");
        $user->remember_token = Str::random(10);
        $user->save();


        $guest = new \App\Models\User();
        $guest->name = "guest";
        $guest->email = "guest@book.com ";
        $guest->password = \Illuminate\Support\Facades\Hash::make("12345");
        $guest->remember_token = Str::random(10);
        $guest->save();
    }
}
