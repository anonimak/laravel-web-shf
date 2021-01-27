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
        $this->call([
                        CreateUsersSeeder::class,
                        CreateMenuComponentConfigSeeder::class,
                        CreateM_OfficeSeeder::class,
                        CreateSliderSeeder::class
                    ]);
        factory(App\Promo::class, 0)->create();

    }
}
