<?php

use Faker\Generator as Faker;

$factory->define(App\producto::class, function (Faker $faker) {

    $path = public_path().'/products_images/';
    $file = $faker->image($path,$width=640, $height=480, 'food');
    $name =  basename($file);;
    //$file->move($path, $name);

    $food = \Faker\Factory::create();
    $food->addProvider(new \FakerRestaurant\Provider\en_US\Restaurant($food));



    return [
        'nombre' => $food->foodName(),
        'precio' => $faker->randomDigit,
        'image' => $name,
    ];
});
