<?php

namespace control_visitantes\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use control_visitantes\Visits;

class VisitsExport implements FromCollection
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        /* ESTA ES LA CONSULTA ELOQUENT, PUEDE SER CUALQUIERA */
        return Visits::all();
    }
}
