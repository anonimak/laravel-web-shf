<?php

use App\Setting;
use Illuminate\Database\Seeder;

class CreateSettingsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $setting = [];

        Setting::create($setting);
    }
}
