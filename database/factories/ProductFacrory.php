<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Product;
use Faker\Generator as Faker;

$factory->define(Product::class, function (Faker $faker) {
    return [
        'name' => $faker->sentence(6),
        'avatar' => "demo-" . random_int(1,9) . ".jpg",
        'description' => $faker->text,
        'price' => $faker->randomNumber(6),
        'details' => $faker->text,
        'amount' => $faker->randomNumber(3),
        'category_id' => $faker->randomElement([1, 2, 3])
    ];
});
