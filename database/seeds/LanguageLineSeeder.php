<?php

namespace Database\Seeders;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;
use Spatie\TranslationLoader\LanguageLine;

class LanguageLineSeeder extends Seeder
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
        LanguageLine::truncate();


        foreach (config('translatable.group_keys') ?? [] as $index => $group) {
            foreach ($group ?? [] as $k => $key) {
                LanguageLine::create([
                    'group' => $index,
                    'key' => $k,
                    'text' => $key,
                ]);
            }
        }

        Schema::enableForeignKeyConstraints();
        Model::reguard();
    }
}
