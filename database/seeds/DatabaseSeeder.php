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
        $this->call([CreateUsersSeeder::class, CreateMenuComponentConfigSeeder::class]);
        // factory(App\User::class, 1)->create();
        factory(App\Promo::class, 0)->create();
        // factory(App\Slider::class, 5)->create();
        App\Slider::create([
            'caption' => '',
            'text' => '',
            'image' => '/img/slider/Banner1.jpg',
            'show' => true
        ]);
    }
}
