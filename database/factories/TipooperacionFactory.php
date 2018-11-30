<?php

$factory->define(App\Tipooperacion::class, function (Faker\Generator $faker) {
    return [
        "tipooperacion" => $faker->name,
    ];
});
