<?php

use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use App\User;
use App\Article;
use Illuminate\Support\Str;

class ArticleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for ($i=0; $i < 20; $i++) { 
            $user = User::inRandomOrder()->first();

            $newArticle = new Article;
            $newArticle->user_id = $user->id;
            $newArticle->title = $faker->sentence(4,true);
            $newArticle->slug = Str::of($newArticle->title)->slug('-');
            $newArticle->content = $faker->paragraph(7, true);
            $newArticle->save();
        }
    }
}
