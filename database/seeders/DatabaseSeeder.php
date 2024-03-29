<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(CategoriesSeeder::class);
        $this->call(UsersSeeder::class);
        $this->call(TagsSeeder::class);
        $this->call(RolesSeeder::class);
        $this->call(LoginSeeder::class);
        $this->call(BookSeeder::class);
       
    }
}
