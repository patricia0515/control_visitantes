<?php

namespace control_visitantes\Http\Controllers;

use control_visitantes\visitante;
use Illuminate\Http\Request;
use control_visitantes\Visits;
use DB;
use Illuminate\Support\Facades\Storage;

class VisitsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $visitas=Visits::all();
        
        return response()->json($visitas);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //validacion por el lado del backend

        $request->validate([
            'descripcion' => 'required',
            'serial' => 'required',
            'visita' => 'required',
            'reg_vehiculo' => 'required',
            'img_vehiculo' => 'required|image',
        ]);

        // Almacenamiento de la imagen al servidor

        $img = $request->file('files')->store('public/img');
        $data = Storage::url($img);

        // Almacenamiento de todos los datos a la BD

        $visita = New Visits;
        $visita->reg_pertenencias = $request->input('reg_pertenencias');
        $visita->descripcion = $request->input('descripcion');
        $visita->serial = $request->input('serial');
        $visita->motivo = $request->input('motivo');
        $visita->sede = $request->input('sede');
        $visita->tip_visitante = $request->input('t_visit');
        $visita->visita = $request->input('visit');
        $visita->resp_visita = $request->input('resp_visita');
        $visita->reg_vehiculo = $request->input('reg_vehicle');
        $visita->vehiculo = $request->input('vehicle');
        $visita->img_vehiculo = $request->input($data);
        $visita->save();

        return redirect()->route('visitas.index')->with('success', 'La visita ha sido registrada');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
