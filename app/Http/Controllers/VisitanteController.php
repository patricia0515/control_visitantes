<?php

namespace control_visitantes\Http\Controllers;

use Illuminate\Http\Request;
use control_visitantes\Visitante;
use control_visitantes\Http\Requests\VisitanteFormRequest;
use Illuminate\Support\Facades\DB;

class VisitanteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $visitantes = Visitante::all();

        return $visitantes->toArray();

        // return response()->json($visitantes);

        // return view('visitantes.index', compact('visitantes'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('visitantes.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(VisitanteFormRequest $request)
    {

        Visitante::create([

            'documento' => $request->documento,
            'nombre' => $request->nombre,
            'apellido' => $request->apellido,
            'empresa' => $request->empresa,
            'contacto' => $request->contacto,
            'rh' => $request->rh,
            'eps' => $request->eps,
            'estado' => 'Activo',
            'no_visitas' => 0,
            'no_salidas' => 0,
            'politica_confidencialidad' => $request->politica_confidencialidad,
            'proteccion_datos' => $request->proteccion_datos,
            'seguridad_salud_trabajo' => $request->seguridad_salud_trabajo,
            't_visita' => $request->t_visita,
            'created_at' => now(),
        ]);
        /* Guardo los datos en la base de datos y retorno a la vista con el mensaje de confirmación */
        return redirect()->route('index')->with('success', 'El visitante a sido añadido con exito');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $visitantes = Visitante::where('documento', '=', $id)->get();

        return response()->json($visitantes);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    
}
