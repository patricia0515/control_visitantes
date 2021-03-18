<?php

namespace control_visitantes;

use Illuminate\Database\Eloquent\Model;

class Visits extends Model
{
    protected $table = 'visitas';

    protected $fillable = [
        'reg_pertenencias',
        'sede', 'descripcion', 
        'tip_visitante', 
        'serial',
        'no_visita',
        'motivo',
        'resp_visita',
        'visitante_id',
        'vehiculo',
        'reg_vehiculo',
        'tipo',
        'tip_vehiculo',
        'img_vehiculo'
    ];

    // protected $dateFormat = 'U';
}
