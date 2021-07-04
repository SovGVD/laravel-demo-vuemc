<?php

namespace Database\Seeders;

use App\Models\Article;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Factories\Sequence;

class ArticleSeeder extends Seeder
{
    public const ARTICLES_NUM = 30;
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Article::factory()
            ->count(self::ARTICLES_NUM)
            ->state(new Sequence(
                fn ($sequence) => ['user_id' => User::all()->random()],
            ))
            ->create();
    }
}
