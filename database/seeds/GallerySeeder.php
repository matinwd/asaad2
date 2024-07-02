<?php

namespace Database\Seeders;

use App\Models\Gallery;
use App\Models\GalleryTranslation;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;

class GallerySeeder extends Seeder
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
        GalleryTranslation::truncate();
        Gallery::truncate();


        if (config('app.is_test') || config('app.is_first')) {
            $alfa = range('A', 'F');
            foreach ($alfa as $index => $item) {
                $i = $index + 1;
                Gallery::create([
                    'slug' => 'gallery-' . $item,
                    'date' => now()->subWeek(),
                    'image' => "https://via.placeholder.com/300x300",
                    'fa' => [
                        'title' => 'آلبوم ' . $item,
                        'text' => ' متن آلبوم ' . $item . ' - ' . ' متن آلبوم ' . $item . ' - ' . ' متن آلبوم ' . $item . ' - ' . ' متن آلبوم ' . $item . ' - ' . ' متن آلبوم ' . $item . ' - ' . ' متن آلبوم ' . $item,
                        'tags' => 'برچسب۱,برچسب۲,برچسب۳,برچسب۴,برچسب۵',
                    ],
                    'en' => [
                        'title' => 'Album ' . $item,
                        'text' => 'Text ' . $item . ' - ' . 'Text ' . $item . ' - ' . 'Text ' . $item . ' - ' . 'Text ' . $item . ' - ' . 'Text ' . $item . ' - ' . 'Text ' . $item . ' - ' . 'Text ' . $item . ' - ',
                        'tags' => 'Tag1,Tag2,Tag3,Tag4,Tag5',
                    ],
                    'pictures' => [
                        'https://via.placeholder.com/800x450',
                        'https://via.placeholder.com/800x450',
                        'https://via.placeholder.com/800x450',
                        'https://via.placeholder.com/800x450',
                    ]
                ]);
            }
        }

        Schema::enableForeignKeyConstraints();
        Model::reguard();
    }
}
