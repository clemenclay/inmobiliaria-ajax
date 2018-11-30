<?php

$factory->define(App\Moneda::class, function (Faker\Generator $faker) {
    return [
        "moneda" => $faker->name,
    ];
});
