<?php

namespace Database\Seeders;

use App\Models\Slide;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;

class SlideSeeder extends Seeder
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
        Slide::truncate();

        if (config('app.is_demo') || config('app.is_first')) {
            Slide::create([
                'name' => 'اسلاید یک',
                'image' => 'https://via.placeholder.com/1600x900',
                'url' => '/slider1',
                'fa' => [
                    'title' => 'عنوان',
                    'details' => 'شرح',
                ]
            ]);
            Slide::create([
                'name' => 'اسلاید دو',
                'image' => 'https://via.placeholder.com/1600x900',
                'url' => '/slider3',
                'fa' => [
                    'title' => 'عنوان',
                    'details' => 'شرح',
                ]
            ]);
            Slide::create([
                'name' => 'اسلاید سه',
                'image' => 'https://via.placeholder.com/1600x900',
                'url' => '/slider3',
                'fa' => [
                    'title' => 'عنوان',
                    'details' => 'شرح',
                ]
            ]);
            Slide::create([
                'name' => 'اسلاید چهار',
                'image' => 'https://via.placeholder.com/1600x900',
                'url' => '/slider4',
                'fa' => [
                    'title' => 'عنوان',
                    'details' => 'شرح',
                ]
            ]);
        }


        Schema::enableForeignKeyConstraints();
        Model::reguard();
    }
}
