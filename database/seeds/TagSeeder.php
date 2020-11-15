<?php

use Illuminate\Database\Seeder;
use App\Tag;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tags = [
            'computers',
            'tv',
            'videogames',
            'books',
            'comcics',
            'random',
            'cooking',
            'holidays',
            'celebration',
            'cleaning',
            'travelling',
            'hiking',
            'motorcicles',
            'bike',
            'stunts',
            'fireworks'
        ];

        foreach($tags as $tag) {
            $newTag = new Tag;
            $newTag->name = $tag;
            $newTag->save();
        }
    }
}
