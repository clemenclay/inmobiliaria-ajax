<?php

$factory->define(App\Galerium::class, function (Faker\Generator $faker) {
    return [
        "nombre" => $faker->name,
    ];
});
