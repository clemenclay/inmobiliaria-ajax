<?php

$factory->define(App\Propiedade::class, function (Faker\Generator $faker) {
    return [
        "propiedades" => $faker->name,
    ];
});
