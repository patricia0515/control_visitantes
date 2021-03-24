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
        $data1 = DB::table('visitantes')
            ->sum('no_visitas');

        $data2 = DB::table('visitantes')
            ->sum('no_salidas');

        $data3 = DB::table('visitantes')
            ->count();

        $data4 = DB::table('visitantes')
            ->select('estado')
            ->where('estado', '=', 'Activo')
            ->count();

        $data5 = DB::table('visitantes')
            ->select('estado')
            ->where('estado', '=', 'Inactivo')
            ->count();

        $data6 = DB::table('visitas')
            ->groupBy('sede');

        $data = [$data1, $data2, $data3, $data4, $data5, $data6];

        return Chartisan::build($data)
            ->labels(['T. Entradas', 'T. Salidas', 'T. Registrados', 'Activos', 'Inactivos', 'Total Áreas Visitadas'])
            ->dataset('Entradas', $data);
    }
}
