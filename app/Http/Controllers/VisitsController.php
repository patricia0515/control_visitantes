<?php

namespace control_visitantes\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use control_visitantes\Http\Requests\VisitsFormRequest;
use Illuminate\Support\Facades\Redirect;
use Maatwebsite\Excel\Facades\Excel;
use control_visitantes\Exports\VisitsExport;
use Carbon\Carbon;
use control_visitantes\Visits;
use control_visitantes\Visitante;



class VisitsController extends Controller
{
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

    public function slider() {
        $fotos = Visits::select('img_vehiculo')
                    ->wherenotNull('img_vehiculo')
                    ->latest()
                    ->take(5)
                    ->get();

        return $fotos->toArray();
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

    public function store(Request $request)
    {
        // validacion del campo imagen

        $request->validate([
            // 'file' => 'image|10',
            'files' => 'mimes:jpeg,jpg,png,gif | max:10100',
        ]);

        // dd($request->all());

        $data = null;

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

    public function edit($id)
    {
        //
    }

    public function update($id)
    {
        $updateVisit = Visits::find($id);
        $updateVisit->tipo = 'salida';
        $updateVisit->save();

        $salidas = Visits::join('visitantes', 'visitas.visitante_id', '=', 'visitantes.id')
            ->where('visitas.id', '=', $id)
            ->increment('no_salidas');

        $msg = '¡Visita actualizada con exito!';

        return response()->json($msg);
    }

    public function destroy($id)
    {
        //
    }

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
