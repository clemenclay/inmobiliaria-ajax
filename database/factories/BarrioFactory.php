<?php

$factory->define(App\Barrio::class, function (Faker\Generator $faker) {
    return [
        "barrio" => $faker->name,
    ];
});
