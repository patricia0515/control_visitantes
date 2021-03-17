<?php

use Illuminate\Database\Seeder;
use control_visitantes\Visitante;
use Illuminate\Support\Facades\DB;


class VisitanteSeeder extends Seeder
{
    /* Creo los array con los datos que ingresan en el select */
    static $rhs = [
        'A+',
        'A-',
        'B+',
        'B-',
        'O+',
        'O-',
        'AB+',
        'AB-'
    ];
    static $tvs = [
        'Contratista',
        'Proveedor',
        'Cliente',
        'Otro'
    ];

    static $epss = [

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
        'Colseguros<',
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
    ];


    public function run()
    {
        foreach (self::$epss as $eps) {
            foreach (self::$tvs as $tv) {
                foreach (self::$rhs as $rh) {
                    DB::table('visitantes')->insert([
                        'documento' => '1024463821',
                        'empresa' => 'COS',
                        'nombre' => 'Patricia',
                        'apellido' => 'Rivera',
                        'contacto' => '3219821061',
                        'rh' => $rh,
                        'eps' => $eps,
                        't_visita' => $tv,
                        'estado' => 'Activo',
                        'politica_confidencialidad' => 'Si acepto',
                        'proteccion_datos' => 'Si acepto',
                        'seguridad_salud_trabajo' => 'Si acepto'
                    ]);
                }
            }
        }
    }
}
