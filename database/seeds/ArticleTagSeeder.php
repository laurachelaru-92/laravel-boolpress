<?php

use Illuminate\Database\Seeder;
use App\Article;
use App\Tag;

class ArticleTagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $articles = Article::all();
        foreach($articles as $article) {
            $randomTags = Tag::inRandomOrder()->limit(rand(1,5))->get();
            $article->tags()->sync($randomTags);
        }
    }
}
