<?php

namespace Database\Seeders;

use App\Models\Language;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;

class LanguagesTableSeed extends Seeder
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
        Language::truncate();

        Language::create([
            'name' => 'فارسی',
            'code' => 'fa',
            'direction' => 'rtl',
            'active' => false,
        ]);

        Language::create([
            'name' => 'English',
            'code' => 'en',
            'direction' => 'ltr',
            'active' => true,
        ]);
        Language::create([
            'name' => 'Dutch',
            'code' => 'de',
            'direction' => 'ltr',
            'active' => 1,
        ]);

        Schema::enableForeignKeyConstraints();
        Model::reguard();
    }
}
