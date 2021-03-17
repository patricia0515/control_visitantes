<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use Faker\Generator as Faker;
use control_visitantes\Visitante;

$factory->define(Visitante::class, function (Faker $faker) {
    return [
        'nombre' => $faker->firstName,
        'apellido' => $faker->lastName,
        'documento' => $faker->unique()->randomNumber($nbDigits = NULL, $strict = false),
        'empresa' => $faker->jobTitle,
        'contacto' => $faker->isbn10,
        'rh' => $faker->randomElement($array = array(
            'A+',
            'A-',
            'B+',
            'B-',
            'O+',
            'O-',
            'AB+',
            'AB-'
        )),
        'eps' => $faker->randomElement($array = array(
            'Colisalud',
            'Caprecom',
            'Cafesalud',
            'Capresoca',
            'Colmedica',
            'Compensar',
            'Cafenacol antioquia',
            'Cafenacol valle',
            'Convida ARS',
            'Coomeva eps',
            'Cruz blanca',
            'Famisanar',
            'Humana vivir',
            'Instituto de los seguros',
            'Salud colmena',
            'Salud colpatria',
            'Salud total',
            'Salud colombia eps',
            'Coomeva eps S.A',
            'Saludcoop',
            'Salud vida',
            'Sanitas',
            'sociales',
            'Salvasalud',
            'Solsalud',
            'S.o.s eps',
            'Susalud',
            'Sura',
            'Capital salud',
            'Confacundi',
            'Savia Salud',
            'Comparta',
            'AMBUQ',
            'CAJACOPI',
            'COMFACOR',
            'EMDISALUD',
            'COMFASUCRE',
            'COOSALUD',
            'MUTUAL SER',
            'NUEVA EPS SUBSIDIADA',
            'SALUDVIDA',
            'NUEVA EPS CONTRIBUTIVO',
            'BONSALUD En Liquidación',
            'Unimec',
            'Colseguros',
            'Comfenalco',
            'EPS Servicio Occidental de Salud',
            'EPS Risaralda Ltda. En Liquidación',
            'Corporanonimas en Liquidación',
            'CAJANAL',
            'BARRANQUILLA SANA',
            'CALISALUD',
            'E.P.S. de CALDAS S.A.',
            'E.P.S. CONDOR S.A.',
            'otra'
        )),
        't_visita' => $faker->randomElement($array = array(
            'Contratista',
            'Proveedor',
            'Cliente',
            'Otro'
        )),
        'estado' => 'Activo',
        'politica_confidencialidad' => 'Si acepto',
        'proteccion_datos' => 'Si acepto',
        'seguridad_salud_trabajo' => 'Si acepto'
    ];
});