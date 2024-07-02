<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \Illuminate\Database\Eloquent\Model::unguard();
        \Illuminate\Support\Facades\Schema::disableForeignKeyConstraints();

        $drop = $this->command->confirm('Drop Tables ??', false);

        if ($drop) {
            $this->command->alert('DB Droping ...');
            $this->command->call('db:drop');
            $this->command->alert('DB Droped');

            $this->command->call('migrate');
        }

        if (!$drop && $this->command->confirm('Truncate Tables ??', true)) {
            $this->command->alert('DB Truncating ...');
            $this->command->call('db:clear');
            $this->command->alert('DB Truncated');
        }

        // Call the passport install
//        $this->command->info("Running Passport install.");
//        $this->command->call('passport:install');

        $this->callList();

        \Illuminate\Support\Facades\Schema::enableForeignKeyConstraints();
        \Illuminate\Database\Eloquent\Model::reguard();
    }

    public function callList()
    {
        \App\Models\User::create([
            'name' => 'مدیر سایت',
            'email' => 'admin@ductcen.com',
            'password' => bcrypt('1234'),
        ]);
        \App\Models\User::create([
            'name' => 'سید احمد شریفی',
            'email' => 'ahmad@ductcen.com',
            'password' => bcrypt('1234'),
        ]);
        \App\Models\User::create([
            'name' => 'متین نوروزی',
            'email' => 'dev@ductcen.com',
            'password' => bcrypt('1234'),
        ]);

        Cache::clear();

        $this->call(\Database\Seeders\LanguagesTableSeed::class);
        $this->call(\Database\Seeders\LanguageLineSeeder::class);
        $this->call(\Database\Seeders\SettingSeeder::class);
        $this->call(\Database\Seeders\CategorySeeder::class);
        $this->call(\Database\Seeders\PostSeeder::class);
        $this->call(\Database\Seeders\ArticleSeeder::class);
        $this->call(\Database\Seeders\GallerySeeder::class);
        $this->call(\Database\Seeders\SlideSeeder::class);
        $this->call(\Database\Seeders\MenuSeeder::class);
        $this->call(\Database\Seeders\FormSeeder::class);
        $this->call(\Database\Seeders\TemplateSeeder::class);
        $this->call(\Database\Seeders\OrderSeeder::class);
        $this->call(\Database\Seeders\ProductSeeder::class);
    }
}
