<?php

namespace control_visitantes\Http\Controllers;

use Illuminate\Http\Request;
use control_visitantes\Visitante;
use control_visitantes\Http\Requests\VisitanteFormRequest;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class VisitanteController extends Controller
{
    public function index()
    {
        $visitantes = Visitante::all();
        return $visitantes->toArray();
    }

    public function lastDays()
    {
        /* cuenta visitas-entradas en la base */
        $data1 = DB::table('visitantes')
            ->join('visitas', 'visitantes.id', '=', 'visitas.visitante_id')
            ->select('visitas.created_at,', 'visitantes.no_visitas')
            ->where('visitas.created_at', '>=', Carbon::now()->subDays(30))
            ->sum('no_visitas');

        /* cuenta número de salidas*/
        $data2 = DB::table('visitantes')
            ->join('visitas', 'visitantes.id', '=', 'visitas.visitante_id')
            ->select('visitas.created_at,', 'visitantes.no_salidas')
            ->where('visitas.created_at', '>=', Carbon::now()->subDays(30))
            ->sum('no_salidas');

        /* cuenta número visitantes registrados en la base de datos*/
        $data3 = DB::table('visitantes')
            /* ->join('visitas', 'visitantes.id', '=', 'visitas.visitante_id') */
            ->select('created_at,')
            ->where('created_at', '>=', Carbon::now()->subDays(30))
            ->count();

        /* cuenta número visitantes Activos en la base de datos*/
        $data4 = DB::table('visitantes')
            ->select('estado', 'created_at')
            ->where('estado', '=', 'Activo')
            /* ->where('created_at', '>=', Carbon::now()->subDays(30)) */
            ->count();

        /* cuenta número visitantes Inactivos en la base de datos*/
        $data5 = DB::table('visitantes')
            ->select('estado')
            ->where('estado', '=', 'Inactivo')
            /* ->where('created_at', '>=', Carbon::now()->subDays(30)) */
            ->count();

        /* cuenta la cantidad de sedes visitadas*/
        $data6 = DB::table('visitas')
            ->distinct()
            ->where('visitas.created_at', '>=', Carbon::now()->subDays(30))
            ->count('sede');

        /* cuenta la cantidad personas que ingresarón*/
        $data7 = DB::table('visitas')
            ->distinct()
            ->where('visitas.created_at', '>=', Carbon::now()->subDays(30))
            ->count('visitante_id');

        $report = [$data1, $data2, $data3, $data4, $data5, $data6, $data7];
        return response(json_encode($report), 200)->header('Content-type', 'text/plain');
    }

    public function filter($data)
    {
        list($inicio, $fin) = explode(",", $data);

        /* cuenta visitas-entradas en la base */
        $data1 = DB::table('visitantes')
            ->join('visitas', 'visitantes.id', '=', 'visitas.visitante_id')
            ->select('visitas.created_at,', 'visitantes.no_visitas')
            ->whereBetween('visitas.created_at', [$inicio, $fin])
            ->sum('no_visitas');

        /* cuenta número de salidas*/
        $data2 = DB::table('visitantes')
            ->join('visitas', 'visitantes.id', '=', 'visitas.visitante_id')
            ->select('visitas.created_at,', 'visitantes.no_salidas')
            ->whereBetween('visitas.created_at', [$inicio, $fin])
            ->sum('no_salidas');

        /* cuenta número visitantes registrados en la base de datos*/
        $data3 = DB::table('visitantes')
            ->join('visitas', 'visitantes.id', '=', 'visitas.visitante_id')
            ->select('visitas.created_at,')
            ->whereBetween('visitas.created_at', [$inicio, $fin])
            ->count();

        /* cuenta número visitantes Activos en la base de datos*/
        $data4 = DB::table('visitantes')
            ->join('visitas', 'visitantes.id', '=', 'visitas.visitante_id')
            ->select('visitantes.estado', 'visitas.created_at')
            ->where('estado', '=', 'Activo')
            ->whereBetween('visitas.created_at', [$inicio, $fin])
            ->count();

        /* cuenta número visitantes Inactivos en la base de datos*/
        $data5 = DB::table('visitantes')
            ->join('visitas', 'visitantes.id', '=', 'visitas.visitante_id')
            ->select('visitantes.estado', 'visitas.created_at')
            ->where('estado', '=', 'Inactivo')
            ->whereBetween('visitas.created_at', [$inicio, $fin])
            ->count();

        /* cuenta la cantidad de sedes visitadas*/
        $data6 = DB::table('visitas')
            ->distinct()
            ->whereBetween('visitas.created_at', [$inicio, $fin])
            ->count('sede');

        $report = [$data1, $data2, $data3, $data4, $data5, $data6];
        return response(json_encode($report), 200)->header('Content-type', 'text/plain');
    }
    public function create()
    {
        return view('visitantes.create');
    }


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

    public function show($id)
    {
        $visitantes = Visitante::where('documento', '=', $id)->get();

        return response()->json($visitantes);
    }
}
