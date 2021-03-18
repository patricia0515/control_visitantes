<?php

namespace control_visitantes\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use control_visitantes\Http\Requests\VisitsFormRequest;
use Illuminate\Support\Facades\Redirect;
use Maatwebsite\Excel\Facades\Excel;
use control_visitantes\Exports\VisitsExport;

use control_visitantes\Visits;

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
                                'visitantes.no_visitas AS cantidadVisitas')
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
            'tipo' => $request->tipo,
            'visitante_id' => $request->visitante_id,
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
        $visitImg = Visits::where('visitante_id', '=', $id)
                        ->select('visitas.img_vehiculo')
                        ->get();

        return response()->json($visitImg);
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
        $updateVisit = Visits::find($id);
        $updateVisit->tipo = 'salida';
        $updateVisit->save();
        $msg = 'Visita actualizada con exito!';

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

    public function comprobarTipo($id) {

        // $visitantes = Visitante::where('id', '=', $id)
        //    ->whereExists(function ($query) {
        //        $query->select(DB::raw(1))
        //              ->from('visitas')
        //              ->whereRaw('visitas.visitante_id = visitantes.id');
        //    })
        //    ->get();
        // return response()->json($visitantes);

        $visitante = Visits::where('visitante_id', '=', $id)
                    ->select('tipo')
                    ->get();

        return response()->json($visitante);
      
    }

    public function exportExcel(){
        return Excel::download(new VisitsExport, 'visits-list.xlsx');
    }
}
