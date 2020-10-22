<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */


use App\Slider;
use Faker\Generator as Faker;

$factory->define(Slider::class, function (Faker $faker) {
    return [
        'caption' => $faker->sentence($nbWords = 6, $variableNbWords = true),
        'text' => $faker->paragraphs($nb = 2, $asText = true),
        'image' => $faker->imageUrl($width = 1024, $height = 480),
        'show' => $faker->boolean(30),
    ];
});
