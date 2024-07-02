<?php

namespace Database\Seeders;

use App\Models\Post;
use App\Models\PostTranslation;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;

class PostSeeder extends Seeder
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
        PostTranslation::truncate();
        Post::truncate();

        if (config('app.is_test') || config('app.is_first')) {
            Post::create([
                'slug' => 'post-a',
                'category_id' => '1',
                'date' => now()->subWeek(),
                'status' => 'publish',
                'options' => [
                    'pictures' => [
                        'assets/images/bg/high-angle-woman-holding-seeds-planting-with-pot_23-2148850876.avif',
                        'assets/images/bg/high-angle-woman-holding-seeds-planting-with-pot_23-2148850876.avif',
                        'assets/images/bg/high-angle-woman-holding-seeds-planting-with-pot_23-2148850876.avif',
                        'assets/images/bg/high-angle-woman-holding-seeds-planting-with-pot_23-2148850876.avif',
                    ]
                ],

                'de' => [
                    'title' => 'News A',
                    'details' => 'Details Of News A * Details Of News A * Details Of News A',
                    'text' => 'Text Of News A * Text Of News A * Text Of News A * Text Of News A * Text Of News A * Text Of News A * Text Of News A * Text Of News A * Text Of News A * Text Of News A * Text Of News A',
                    'tags' => 'tagEn1,tagEn2,tagEn3,tagEn4,tagEn5',
                ],
                'en' => [
                    'title' => 'News A',
                    'details' => 'Details Of News A * Details Of News A * Details Of News A',
                    'text' => 'Text Of News A * Text Of News A * Text Of News A * Text Of News A * Text Of News A * Text Of News A * Text Of News A * Text Of News A * Text Of News A * Text Of News A * Text Of News A',
                    'tags' => 'tagEn1,tagEn2,tagEn3,tagEn4,tagEn5',
                ],
            ]);
            Post::create([
                'slug' => 'post-b',
                'category_id' => '2',
                'date' => now()->subWeek(),
                'status' => 'publish',
                'options' => [
                    'pictures' => [
                        'assets/images/bg/green-leaf-texture-leaf-texture-background_501050-120.avif',
                        'assets/images/bg/green-leaf-texture-leaf-texture-background_501050-120.avif',
                        'assets/images/bg/green-leaf-texture-leaf-texture-background_501050-120.avif',
                        'assets/images/bg/green-leaf-texture-leaf-texture-background_501050-120.avif',
                    ]
                ],

                'en' => [
                    'title' => 'News B',
                    'details' => 'Details Of News B * Details Of News B * Details Of News B',
                    'text' => 'Text Of News B * Text Of News B * Text Of News B * Text Of News B * Text Of News B * Text Of News B * Text Of News B * Text Of News B * Text Of News B * Text Of News B * Text Of News B',
                    'tags' => 'tagEn1,tagEn2,tagEn3,tagEn4,tagEn5',
                ],
                'de' => [
                    'title' => 'News B',
                    'details' => 'Details Of News B * Details Of News B * Details Of News B',
                    'text' => 'Text Of News B * Text Of News B * Text Of News B * Text Of News B * Text Of News B * Text Of News B * Text Of News B * Text Of News B * Text Of News B * Text Of News B * Text Of News B',
                    'tags' => 'tagEn1,tagEn2,tagEn3,tagEn4,tagEn5',
                ],
            ]);

            Post::create([
                'slug' => 'post-c',
                'category_id' => '1',
                'date' => now()->subWeek(),
                'status' => 'publish',
                'options' => [
                    'pictures' => [
                        'assets/images/bg/hands-holding-fresh-grain-harvest_53876-139753.avif',
                        'assets/images/bg/hands-holding-fresh-grain-harvest_53876-139753.avif',
                    ]
                ],

                'en' => [
                    'title' => 'News C',
                    'details' => 'Details Of News C * Details Of News C * Details Of News C',
                    'text' => 'Text Of News C * Text Of News C * Text Of News C * Text Of News C * Text Of News C * Text Of News C * Text Of News C * Text Of News C * Text Of News C * Text Of News C * Text Of News C',
                    'tags' => 'tagEn1,tagEn2,tagEn3,tagEn4,tagEn5',
                ],
                'de' => [
                    'title' => 'News C',
                    'details' => 'Details Of News C * Details Of News C * Details Of News C',
                    'text' => 'Text Of News C * Text Of News C * Text Of News C * Text Of News C * Text Of News C * Text Of News C * Text Of News C * Text Of News C * Text Of News C * Text Of News C * Text Of News C',
                    'tags' => 'tagEn1,tagEn2,tagEn3,tagEn4,tagEn5',
                ],
            ]);
            Post::create([
                'slug' => 'post-d',
                'category_id' => '2',
                'date' => now()->subWeek(),
                'status' => 'publish',
                'options' => [
                    'pictures' => [
                        'assets/images/bg/hands-holding-fresh-grain-harvest_53876-139753.avif',
                        'assets/images/bg/hands-holding-fresh-grain-harvest_53876-139753.avif',
                    ]
                ],

                'en' => [
                    'title' => 'News D',
                    'details' => 'Details Of News D * Details Of News D * Details Of News D',
                    'text' => 'Text Of News D * Text Of News D * Text Of News D * Text Of News D * Text Of News D * Text Of News D * Text Of News D * Text Of News D * Text Of News D * Text Of News D * Text Of News D',
                    'tags' => 'tagEn1,tagEn2,tagEn3,tagEn4,tagEn5',
                ],
                'de' => [
                    'title' => 'News D',
                    'details' => 'Details Of News D * Details Of News D * Details Of News D',
                    'text' => 'Text Of News D * Text Of News D * Text Of News D * Text Of News D * Text Of News D * Text Of News D * Text Of News D * Text Of News D * Text Of News D * Text Of News D * Text Of News D',
                    'tags' => 'tagEn1,tagEn2,tagEn3,tagEn4,tagEn5',
                ],
            ]);
        }

        Schema::enableForeignKeyConstraints();
        Model::reguard();
    }
}
