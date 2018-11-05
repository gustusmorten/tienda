<?php

use Faker\Generator as Faker;

$factory->define(App\tienda::class, function (Faker $faker) {
    return [
        'nombre'=>$faker->company,
        'direccion'=>$faker->address
    ];
});
