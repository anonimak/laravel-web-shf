<?php

use App\Promo;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class CreatePromoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $promo = [];

        foreach ($promo as $key => $value) {
            Promo::create($value);
        }
    }
}
