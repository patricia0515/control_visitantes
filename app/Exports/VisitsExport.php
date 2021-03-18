<?php

namespace control_visitantes\Exports;

/* Poseciona un encabezado */

use Maatwebsite\Excel\Concerns\WithHeadings;
/*  Control del ancho automatico de la columna */
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
/* Dando estilos a las celdas */
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
/* Me permite exportar la consulta en especifico */
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromQuery;

use control_visitantes\Visits;

class VisitsExport implements FromQuery, WithHeadings, ShouldAutoSize, WithStyles
{
    use Exportable;
    /**
     * @return \Illuminate\Support\Collection
     */
    // public function collection()
    // {
    // }

    public function query()
    {
        return Visits::join('visitantes', 'visitas.visitante_id', '=', 'visitantes.id')
            ->select(
                'visitantes.documento as cedula',
                'visitantes.nombre',
                'visitantes.apellido',
                'visitantes.created_at as fecha_ing',
                'visitas.reg_pertenencias as pertenencias',
                'visitas.sede',
                'visitas.serial',
                'visitas.resp_visita',
                'visitas.motivo',
                'visitas.descripcion',
                'visitas.visita',
                'visitas.tip_visitante',
                'visitas.updated_at as salida'
            );
    }

    public function headings(): array
    {
        return [
            'CEDULA',
            'NOMBRE',
            'APELLIDO',
            'FECHA DE INGRESO',
            'REGISTRO DE PERTENENCIAS',
            'AREA',
            'SERIAL',
            'RESPONSABLE DE VISITA',
            'MOTIVO DE VISITA',
            'DESCRIPCION',
            'VISITA A',
            'TIPO VISITA',
            'HORA DE SALIDA',
        ];
    }

    public function styles(Worksheet $sheet)
    {
        return [
            // Style the first row as bold text.
            1    => ['font' => ['bold' => true], ['italic' => true]],

            // Styling a specific cell by coordinate.
            /* 'B2' => ['font' => ['italic' => true]], */

            // Styling an entire column. edita columna C en letra tamaño 16
            /* 'C'  => ['font' => ['size' => 16]], */
        ];
    }
}
