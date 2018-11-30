<?php

$factory->define(App\Propiedade::class, function (Faker\Generator $faker) {
    return [
        "publicado" => 0,
        "titulo" => $faker->name,
        "descripcion" => $faker->name,
        "precio" => $faker->randomNumber(2),
        "moneda_id" => factory('App\Moneda')->create(),
        "barrio_id" => factory('App\Barrio')->create(),
        "operacion_id" => factory('App\Tipooperacion')->create(),
    ];
});
