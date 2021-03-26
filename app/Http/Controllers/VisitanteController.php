<?php

namespace control_visitantes\Http\Controllers;

use Illuminate\Http\Request;
use control_visitantes\Visitante;
use control_visitantes\Http\Requests\VisitanteFormRequest;
use Illuminate\Support\Facades\DB;

class VisitanteController extends Controller
{
    public function index()
    {
        $visitantes = Visitante::all();
        return $visitantes->toArray();
    }

    public function all($data)
    {       
        
        /* cuenta visitas-entradas en la base */
        $data1 = DB::table('visitantes')
            ->sum('no_visitas');

        /* cuenta número de salidas*/
        $data2 = DB::table('visitantes')
            ->sum('no_salidas');

        /* cuenta número visitantes registrados en la base de datos*/
        $data3 = DB::table('visitantes')
            ->count();

        /* cuenta número visitantes Activos en la base de datos*/
        $data4 = DB::table('visitantes')
            ->select('estado')
            ->where('estado', '=', 'Activo')
            ->count();

        /* cuenta número visitantes Inactivos en la base de datos*/
        $data5 = DB::table('visitantes')
            ->select('estado')
            ->where('estado', '=', 'Inactivo')
            ->count();

        /* cuenta la cantidad de sedes visitadas*/
        $data6 = DB::table('visitas')
            ->distinct()
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

    public function edit($id)
    {
        //
    }
    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
