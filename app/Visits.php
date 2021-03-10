<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Visits extends Model
{
    protected $table = 'visitas';

    protected $fillable = [
        'reg_pertenencias',
        'sede', 'descripcion', 
        'tip_visitante', 
        'serial',
        'visita',
        'motivo',
        'resp_visita',
        'vehiculo',
        'reg_vehiculo',
        'img_vehiculo'
    ];
}
