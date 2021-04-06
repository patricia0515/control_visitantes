<?php

namespace control_visitantes\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Redirect;
use Maatwebsite\Excel\Facades\Excel;
use control_visitantes\Exports\VisitsExport;
use Carbon\Carbon;
use control_visitantes\Visits;

class VisitsController extends Controller
{   
    /**
     * Muestra todos los datos
     * de la tabla visitas
     *
     * @return array
    */
    public function index()
    {
        $visitas = Visits::join('visitantes', 'visitas.visitante_id', '=', 'visitantes.id')
            ->select(
                'visitas.*',
                'visitantes.documento AS documentoVisitante',
                'visitantes.no_visitas AS cantidadVisitas'
            )
            ->orderBy('visitas.id', 'desc')
            ->get();

        return $visitas->toArray();
    }

    /**
     * Muestra las imagenes de 
     * los vehiculos en el slider
     *
     * @return array
    */
    public function slider()
    {
        $fotos = Visits::join('visitantes', 'visitas.visitante_id', '=', 'visitantes.id')
            ->select(
                'visitas.img_vehiculo',
                'visitas.created_at',
                'visitantes.documento As documentoVisitante'
            )
            ->wherenotNull('img_vehiculo')
            ->latest()
            ->take(5)
            ->get();

        return $fotos->toArray();
    }

    /**
     * Guarda los datos de
     * un nuevo visitante
     *
     * @return \Illuminate\Http\Response
    */
    public function store(Request $request)
    {
        // validacion del campo imagen
        $request->validate([
            'files' => 'mimes:jpeg,jpg,png,gif | max:10100',
        ]);

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

    /**
     * Muestra la imagen del 
     * vehiculo a traves de un id
     *
     * @return array
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
     * Actualiza el estado del 
     * visitante por medio del id
     * 
     * @return \Illuminate\Http\Response
    */
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

    /**
     * Consulta el estado del 
     * visitante por medio del id
     * 
     * @return array
    */
    public function checkStateVisit($id)
    {
        $visitante = Visits::where('visitante_id', '=', $id)
            ->select('tipo', 'id')
            ->get();
        return $visitante->toArray();
    }

    /**
     * Metodo que realiza la exportacion
     * de los datos a un archivo excel
     * 
     * @return VisitsExport
    */
    public function exportExcel(Request $request)
    {
        $filtro1 = $request->fecha_inicial;
        $filtro2 = $request->fecha_final;
        return (new VisitsExport($filtro1, $filtro2))->download('visits-list.xlsx');
    }
}
