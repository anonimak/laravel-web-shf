<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Promo;
use Faker\Generator as Faker;

$factory->define(Promo::class, function (Faker $faker) {
    return [
        'title' => $faker->sentence($nbWords = 6, $variableNbWords = true),
        'image' => $faker->imageUrl($width = 348, $height = 232),
        'description' => $faker->paragraphs($nb = 5, $asText = true),
        'status' => $faker->boolean(30),
        'set_banner' => $faker->boolean(10),
        'start_date' => $faker->dateTimeBetween($startDate = '-30 years', $endDate = 'now', $timezone = null),
        'end_date' => $faker->dateTime(),
    ];
});
