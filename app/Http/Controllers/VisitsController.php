<?php

namespace control_visitantes\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use control_visitantes\Http\Requests\VisitsFormRequest;
use Illuminate\Support\Facades\Redirect;
use Maatwebsite\Excel\Facades\Excel;
use control_visitantes\Exports\VisitsExport;
use Carbon\Carbon;
use control_visitantes\Charts\ReporteVisitas;
use control_visitantes\Visits;
use control_visitantes\Visitante;

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
            ->select(
                'visitas.*',
                'visitantes.documento AS documentoVisitante',
                'visitantes.no_visitas AS cantidadVisitas'
            )
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
        // validacion del campo imagen

        $request->validate([
            // 'file' => 'image|10',
            'files' => 'mimes:jpeg,jpg,png,gif | max:10100',
        ]);

        // dd($request->all());

        $data = '';

        if ($request->file('files')) {

            // Almacenamiento de la imagen al servidor

            $img = $request->file('files')->store('public/img');
            $data = Storage::url($img);
        }

        //Almacenamiento de los datos a la BD

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
            'visitante_id' => $request->visitante_id,
            'tipo' => 'entrada',
            'vehiculo' => $request->vehiculo,
            'tip_vehiculo' => $request->tip_vehiculo,
            'img_vehiculo' => $data,
            'entrada' => Carbon::now()
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
        $visitID = Visits::where('id', '=', $id)
            ->select('visitas.visitante_id')
            ->get();

        $visitImg = Visits::where('id', '=', $id)
            ->where('visitante_id', '=', $visitID[0]["visitante_id"])
            ->select('visitas.img_vehiculo')
            ->get();

        return $visitImg->toArray();
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
    public function update($id)
    {
        /* $updateVisit = Visits::find($id);
        $updateVisit->tipo = 'salida';
        $updateVisit->save(); */

        $updateVisit = Visits::join('visitantes', 'visitas.visitante_id', '=', 'visitantes.id')
            ->find($id);
        $updateVisit->tipo = 'salida';
        $updateVisit->no_salidas->increment('no_salidas');
        $updateVisit->save();


        $msg = '¡Visita actualizada con exito!';

        return response()->json($msg);
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

    /**
     * Devuelve el la consulta para verificar 
     * el estado de una visita
     *
     * @param  int  $id
     * @return array
     */
    public function checkStateVisit($id)
    {

        $visitante = Visits::where('visitante_id', '=', $id)
            ->select('tipo', 'id')
            ->get();
        return $visitante->toArray();
    }

    public function exportExcel(Request $request)
    {
        $filtro1 = $request->fecha_inicial;
        $filtro2 = $request->fecha_final;

        return (new VisitsExport($filtro1, $filtro2))->download('visits-list.xlsx');
    }
}
