<?php

namespace control_visitantes\Http\Controllers;

use Illuminate\Http\Request;
use control_visitantes\Visits;
use DB;
use Illuminate\Support\Facades\Storage;
use control_visitantes\Http\Requests\VisitsFormRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;

class VisitsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $visitas = Visits::join('visitantes', 'visitas.visitante_id', '=', 'visitantes.id')
                        ->select('visitas.*', 'visitantes.documento AS documentoVisitante',
                                'visitantes.visitas AS cantidadVisitas')
                        ->get();
        
        return $visitas->toArray();
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

        $data = '';

        // Almacenamiento de la imagen al servidor
        if($request->file('files')) {

            $img = $request->file('files')->store('public/img');
            $data = Storage::url($img);

        }
        // Almacenamiento de todos los datos a la BD

        
        
        Visits::create([
            'reg_pertenencias' => $request->reg_pertenencias,
            'descripcion' => $request->descripcion,
            'serial' => $request->serial,
            'motivo' => $request->motivo,
            'sede' => $request->sede,
            'tip_visitante' => $request->tip_visitante,
            'visita' => $request->visita,
            'resp_visita' => $request->resp_visita,
            'reg_vehiculo' => $request->reg_vehiculo,
            'vehiculo' => $request->vehiculo,
            'img_vehiculo' => $data,
        ]);

        return redirect()->route('index')->with('success', 'La visita ha sido registrada');
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
