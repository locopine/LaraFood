<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Plan;
use Faker\Generator as Faker;

$factory->define(Plan::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'url' => $faker->url,
        'price' => $faker->randomFloat(2, 0, 9999999999.99),
        'description' => $faker->text,
    ];
});
