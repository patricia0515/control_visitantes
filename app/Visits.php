<?php

namespace control_visitantes;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Visits extends Model
{
    public function getDates()
    {
        return [
            'created_at',
            'updated_at',
        ];
    }
    protected $table = 'visitas';

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

    // protected $dateFormat = 'U';
}
