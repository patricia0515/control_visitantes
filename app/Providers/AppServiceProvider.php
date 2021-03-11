<?php

namespace control_visitantes\Providers;

use Illuminate\Support\ServiceProvider;
/* Añadimos la libreria para poder trabajar con base de datos Maria DB */
/* use Illuminate\Support\Facades\Schema; */

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        // Ponemos en el metodo Boot la sigiente linea de codigo. llamamos al metodo estatico de Schema y le indicamos la longitud de las cadenas.
        /* Schema::defaultStringLength(191); */
    }
}
