<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Product;
use App\Models\Category;
use Faker\Generator as Faker;

$factory->define(Product::class, function (Faker $faker) {
    return [
        'title' => $faker->title,
            'category_id' => Category::all()->random()->id,
            'slug'=>$faker->title,
            'description'=>$faker->realText(),
            'price'=>random_int(100 ,1000),
            'sale_price'=>random_int(0 ,1000),
    ];
});
