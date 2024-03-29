<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TagsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tag = new \App\Models\Tag();
        $tag->typetag="newrelease";
        $tag->save();

        $tag = new \App\Models\Tag();
        $tag->typetag="bestseller";
        $tag->save();

        $tag = new \App\Models\Tag();
        $tag->typetag="romantic";
        $tag->save();

        $tag = new \App\Models\Tag();
        $tag->typetag="oldschool";
        $tag->save();

        $tag = new \App\Models\Tag();
        $tag->typetag="psychologic";
        $tag->save();
    }
}
