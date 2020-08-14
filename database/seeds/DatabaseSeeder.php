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
        $this->call([CreateUsersSeeder::class, CreateSettingsSeeder::class]);
        // factory(App\User::class, 1)->create();
        factory(App\Promo::class, 100)->create();
    }
}
