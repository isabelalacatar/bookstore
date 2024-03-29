<?php

namespace Database\Seeders;

use App\Models\Book;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Book::create([
            'title' => 'Jackie and Maria',
            'author' => 'Gill Paul',
            'description' => 'Told from alternating perspectives, Jackie and Maria follows the lives of Jackie Kennedy
             and Maria Callas — two women in love with the same man.',
            'category' => 'fiction',
            'tags' => 'romantic',
            'coverimage' => '48896281.jpg',
            'price' => '70'
        ]);
        Book::create([
            'title' => 'Silent spring',
            'author' => 'Rachel Carson',
            'description' => 'The essential, cornerstone book of modern environmentalism is now offered in a
             handsome 40th anniversary edition which features..',
            'category' => 'nonfiction',
            'tags' => 'romantic',
            'coverimage' => 'images1.jpg',
            'price' => '100'
        ]);
        Book::create([
            'title' => 'Steve Jobs',
            'author' => 'Walter Isaacson',
            'description' => 'Steve Jobs is the authorized self-titled biography of American business magnate
            and Apple co-founder Steve Jobs.',
            'category' => 'biography',
            'tags' => 'newrelease',
            'coverimage' => 'biography.jpg',
            'price' => '150'
        ]);
        Book::create([
            'title' => 'When the world',
            'author' => 'Liz Kessler',
            'description' => 'From the New York Times bestselling author of the Emily Windsnap series..
            ',
            'category' => 'history',
            'tags' => 'bestseller',
            'coverimage' => 'when-the-world-was-ours-9781534499652_xlg-1.jpg',
            'price' => '50'
        ]);
        Book::create([
            'title' => 'Hyperion',
            'author' => 'Dan Simmons',
            'description' => 'Hyperion is a 1989 science fiction novel by American author ..',
            'category' => 'sciencefiction',
            'tags' => 'oldschool',
            'coverimage' => 'hyperion.jpg',
            'price' => '90'
        ]);
        Book::create([
            'title' => 'American Gods',
            'author' => 'Neil Gaiman',
            'description' => 'American Gods is a fantasy novel by British author Neil Gaiman.
            The novel is a blend of Americana...',
            'category' => 'fantasy',
            'tags' => 'psychologic',
            'coverimage' => 'gods.jpg',
            'price' => '80'
        ]);
        Book::create([
            'title' => 'Spare',
            'author' => 'Prince Harry',
            'description' => 'Spare is a memoir by Prince Harry, Duke of Sussex, which was released on 10 January 2023.
            ...',
            'category' => 'memoir',
            'tags' => 'psychologic',
            'coverimage' => 'images.jpg',
            'price' => '70'
        ]);
    }
}
