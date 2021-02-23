<?php

use App\Funcionarios;
use Faker\Generator as Faker;

$factory->define(Funcionarios::class, function (Faker $faker) {
    return [
        'nome' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'endereco' => $faker->address,
        'idade' => $faker->randomDigit,
        'nascimento' => $faker->date,
        'salario' => $faker->numberBetween(2000, 8000),
        'observacao' => $faker->text(200),
    ];
});
