<?php

namespace Database\Seeders;

use App\Models\Article;
use App\Models\ArticleTranslation;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;

class ArticleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();
        Schema::disableForeignKeyConstraints();
        ArticleTranslation::truncate();
        Article::truncate();

        if (config('app.is_test') || config('app.is_first')) {
            Article::create([
                'slug' => 'article-a',
                'options' => [
                    'pictures' => [
                        'https://via.placeholder.com/800x450',
                        'https://via.placeholder.com/800x450',
                    ]
                ],
                'fa' => [
                    'title' => 'مقاله یک',
                    'details' => 'شرح کوتاه مقاله یک * شرح کوتاه مقاله یک * شرح کوتاه مقاله یک',
                    'text' => 'متن مقاله یک * متن مقاله یک * متن مقاله یک * متن مقاله یک * متن مقاله یک * متن مقاله یک * متن مقاله یک * متن مقاله یک * متن مقاله یک * متن مقاله یک * متن مقاله یک',
                ],
                'en' => [
                    'title' => 'Article A',
                    'details' => 'Details Of Article A * Details Of Article A * Details Of Article A',
                    'text' => 'Text Of Article A * Text Of Article A * Text Of Article A * Text Of Article A * Text Of Article A * Text Of Article A * Text Of Article A * Text Of Article A * Text Of Article A * Text Of Article A * Text Of Article A',
                ],
            ]);
            Article::create([
                'slug' => 'article-b',
                'options' => [
                    'pictures' => [
                        'https://via.placeholder.com/800x450',
                        'https://via.placeholder.com/800x450',
                        'https://via.placeholder.com/800x450',
                    ]
                ],
                'fa' => [
                    'title' => 'مقاله دو',
                    'details' => 'شرح کوتاه مقاله دو * شرح کوتاه مقاله دو * شرح کوتاه مقاله دو',
                    'text' => 'متن مقاله دو * متن مقاله دو * متن مقاله دو * متن مقاله دو * متن مقاله دو * متن مقاله دو * متن مقاله دو * متن مقاله دو * متن مقاله دو * متن مقاله دو * متن مقاله دو',
                ],
                'en' => [
                    'title' => 'Article B',
                    'details' => 'Details Of Brticle B * Details Of Brticle B * Details Of Brticle B',
                    'text' => 'Text Of Brticle B * Text Of Brticle B * Text Of Brticle B * Text Of Brticle B * Text Of Brticle B * Text Of Brticle B * Text Of Brticle B * Text Of Brticle B * Text Of Brticle B * Text Of Brticle B * Text Of Brticle B',
                ],
            ]);
        }

        Schema::enableForeignKeyConstraints();
        Model::reguard();
    }
}
