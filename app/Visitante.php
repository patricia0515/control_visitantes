<?php

namespace control_visitantes;

use Illuminate\Database\Eloquent\Model;

class Visitante extends Model
{   
    /**
     * Indica el nombre de la tabla 
     *
     * @var string
    */
    protected $table = 'visitantes';

    /**
     * Indica el campo de la llave primaria
     *
     * @var string
    */
    protected $primaryKey = "id";

    /**
     * Indica si el modelo quiere timestamps
     *
     * @var bool
    */
    public $timestamps = true;

    /**
     * Indica los atributos que son asginados de forma masiva
     *
     * @var array
    */
    protected $fillable = [
        'documento',
        'nombre',
        'apellido',
        'empresa',
        'contacto',
        'rh',
        'eps',
        't_visita',
        'estado',
        'politica_confidencialidad',
        'proteccion_datos',
        'seguridad_salud_trabajo',
        'no_salidas',
        'no_visitas'
    ];

    /* La diferencia es que aqui podemos especificar cuando 
    no queremos que se asignen al modelo */
    protected $guarded = [];
}
