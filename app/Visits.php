<?php

namespace control_visitantes;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Visits extends Model
{
    /**
     * Indica el nombre de la tabla 
     *
     * @var string
    */
    protected $table = 'visitas';

    /**
     * Indica los atributos que son asginados de forma masiva
     *
     * @var array
    */
    protected $fillable = [
        'reg_pertenencias',
        'sede', 'descripcion',
        'tip_visitante',
        'serial',
        'visita',
        'motivo',
        'visita',
        'resp_visita',
        'visitante_id',
        'vehiculo',
        'reg_vehiculo',
        'tipo',
        'tip_vehiculo',
        'img_vehiculo',

    ];

    public function getDates()
    {
        return [
            'created_at',
            'updated_at',
        ];
    }
}
