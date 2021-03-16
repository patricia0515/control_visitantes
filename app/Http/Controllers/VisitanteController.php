<?php

namespace control_visitantes\Http\Controllers;

use Illuminate\Http\Request;
use control_visitantes\Visitante;
use control_visitantes\Http\Requests\VisitanteFormRequest;
use DB;


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

        return view('visitantes.index', compact('visitantes'));
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
        $visitante = New Visitante;

        $visitante->empresa = $request->input('empresa');
        $visitante->nombre = $request->input('nombre');
        $visitante->apellido = $request->input('apellido');
        $visitante->contacto = $request->input('contacto');
        $visitante->rh = $request->input('rh');
        $visitante->eps = $request->input('eps');
        $visitante->t_visita = $request->input('t_visita');
        $visitante->documento = $request->input('documento');
        $visitante->save();

        return redirect()->route('visitantes.index')->with('success', 'El visitante a sido añadido con exito');

        // Visitante::create([

        //     'documento' => $request->documento,
        //     'nombre' => $request->nombre,
        //     'apellido' => $request->apellido,
        //     'empresa' => $request->empresa,
        //     'contacto' => $request->contacto,
        //     'rh' => $request->rh,
        //     'eps' => $request->eps,
        //     't_visita' => $request->t_visita,
        //     'created_at' => now(),
        // ]);
        /* Guardo los datos en la base de datos y retorno a la vista con el mensaje de confirmación */
        // return redirect()->route('visitantes.index')->with('success', 'El visitante a sido añadido con exito');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
    
            /* 
            Si viene algun dato desde el buscador
            lo almaceno en la variable $query sin 
            espacios en blaco con el metodo trim */
            // $searchText = trim($request->get('searchText'));
            // $visitantes = Visitante::orderBy('id', 'desc')
            //     ->where('documento', '=', $searchText)
            //     ->simplePaginate(3);
            // return view('visitantes.show', compact('visitantes', 'searchText'));

            /* return response()->json($visitantes); */
        
            $visitantes = Visitante::where('documento','=',$id)->get();

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
