<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Product;
use Faker\Generator as Faker;

$factory->define(Product::class, function (Faker $faker) {
    return [
        'code'       => $faker->uuid,
        'price'      => $faker->numberBetween(350, 1390),
        'arrived_at' => now(),
    ];
});
