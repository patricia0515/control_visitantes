<?php

namespace control_visitantes;

use Illuminate\Database\Eloquent\Model;

class Visitante extends Model
{
    protected $table = 'visitantes';
    protected $primaryKey = "id";
    public $timestamps = true;
    /* Especifico cuales son los campos que van a recibir
    un valor para poder almacenarlo en la base de datos */
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
        'visitas',
        'politica_confidencialidad',
        'proteccion_datos',
        'seguridad_salud_trabajo'

    ];

    /* La diferencia es que aqui podemos especificar cuando 
    no queremos que se asignen al modelo */
    protected $guarded = [];
}
