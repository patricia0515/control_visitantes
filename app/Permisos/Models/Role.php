<?php

namespace control_visitantes\Permisos\Models;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    //desde aqui inciamos con los campos de la tabla que necesitamos
    protected $fillable = [
        'name', 'slug', 'descripcion', 'full-access',
    ];
}
