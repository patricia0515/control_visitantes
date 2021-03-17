<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use Faker\Generator as Faker;
use control_visitantes\Visitante;
use Illuminate\Support\Str;

$factory->define(Visitante::class, function (Faker $faker) {
    return [
        'nombre' => $faker->firstName,
        'apellido' => $faker->lastName,
        'documento' => $faker->unique()->randomNumber($nbDigits = NULL, $strict = false),
        'empresa' => $faker->jobTitle,
        'contacto' => $faker->e164PhoneNumber,
        'rh' => $rh,
        'eps' => $eps,
        't_visita' => $faker->randomElement($array = array('Contratista', 'Proveedor', 'Cliente', 'Otro')),
        'estado' => 'Activo',
        'politica_confidencialidad' => 'Si acepto',
        'proteccion_datos' => 'Si acepto',
        'seguridad_salud_trabajo' => 'Si acepto'
    ];
});
