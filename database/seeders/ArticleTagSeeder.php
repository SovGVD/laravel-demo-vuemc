<?php

namespace Database\Seeders;

use App\Models\Article;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ArticleTagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Article::all()->each(function ($article) {
            $tags = rand(5, 10);

            $usedTags = [];

            foreach(range(1, $tags) as $index) {
                $tagId = rand(1, TagSeeder::TAGS_NUMBER -1);

                if (!in_array($tagId, $usedTags)) {
                        
                    DB::table('article_tag')->insert([
                        'article_id' => $article->id,
                        'tag_id' => $tagId,
                    ]);

                    $usedTags[] = $tagId;
                }
            }
        });
    }
}
