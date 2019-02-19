<?php

namespace App\Exports;

use App\Productos;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Events\AfterSheet;

class ProductosExport implements FromCollection,WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {	//$pro=['id','nombre','descripcion','stock'];
        $pro=Productos::all();
        return $pro;
    }

    public function headings(): array
    {
   
        return [
            'Id',
            'Nombre',
            'Descripcion',
            'Stock',
        ];
    }

    public function registerEvents(): array
    {
        return [
            AfterSheet::class    => function(AfterSheet $event) {
                //$cellRange = 'A1:W1'; // All headers
                //$event->sheet->getDelegate()->getStyle($cellRange)->getFont('arial')->setSize(36);
                $event->sheet->styleCells(
                   'A1:W',
    [
        'alignment' => [
               'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
        ],                        
       'font' => [
                'name' => 'Century Gothic',
                'size' => 11,
                'bold' => true,
                'color' => ['argb' => 'EB2B02'],
         ]
      ]
);
            },
        ];
    }

    
}
