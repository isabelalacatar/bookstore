<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $category = new \App\Models\Category();
        $category->typecategory = "fiction";
        $category->save();

        $category = new \App\Models\Category();
        $category->typecategory = "nonfiction";
        $category->save();

        $category = new \App\Models\Category();
        $category->typecategory = "biography";
        $category->save();

        $category = new \App\Models\Category();
        $category->typecategory = "history";
        $category->save();

        $category = new \App\Models\Category();
        $category->typecategory = "sciencefiction";
        $category->save();

        $category = new \App\Models\Category();
        $category->typecategory = "fantasy";
        $category->save();

        $category = new \App\Models\Category();
        $category->typecategory = "memoir";
        $category->save();
    
    } 
}
