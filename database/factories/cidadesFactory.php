<?php

use App\Cidade;
use Faker\Generator as Faker;

$factory->define(Cidade::class, function (Faker $faker) {
    return [
        'cidade' => $faker->country,
        'UF' => $faker->stateAbbr,
    ];
});
