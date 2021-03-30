<?php

namespace control_visitantes\Http\Middleware;

use Illuminate\Support\Facades\Auth;
use Closure;

class SoloAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        // condicional autenticando los diferentes tipos usuarios

        if (Auth::user()->rol_usercrm == "Administrador") {

            return $next($request); //si es Admin va a la vista de ese rol.

        } else{

            return redirect('/'); //si no es admin dirige a la vista principal del usuario
        }
    }
}
