<?php

use Illuminate\Database\Seeder;
use App\Slider;

class CreateSliderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $sliders = [
            [
                'caption' => null,
                'text' => null,
                'image' => 'public/sliders/slider1.jpg',
                'show' => true
            ],
            [
                'caption' => null,
                'text' => null,
                'image' => 'public/sliders/slider2.jpg',
                'show' => true
            ]
        ];

        foreach ($sliders as $key => $slider) {
            Slider::create($slider);
        }
    }
}
