<?php

declare(strict_types=1);

namespace control_visitantes\Charts;

use Chartisan\PHP\Chartisan;
use ConsoleTVs\Charts\BaseChart;
use Illuminate\Http\Request;
use control_visitantes\Visitante;
use Illuminate\Support\Facades\DB;

class ReportChart extends BaseChart
{
    /**
     * Handles the HTTP request for the given chart.
     * It must always return an instance of Chartisan
     * and never a string or an array.
     */
    public function handler(Request $request): Chartisan
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

        $data = [$data1, $data2, $data3, $data4, $data5, $data6];

        return Chartisan::build($data)
            ->labels(['T. Entradas', 'T. Salidas', 'T. Registrados', 'Activos', 'Inactivos', 'Total Áreas Visitadas'])
            ->dataset('Entradas', $data);
    }
}
