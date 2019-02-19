<?php

namespace App\Exports;

use App\Productos;
use Maatwebsite\Excel\Concerns\FromCollection;
    use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class ProductosExportView implements FromView
{
    /**
    * @return \Illuminate\Support\Collection
    */
   private $data;

    public function __construct($data)
    {
        $this->data = $data;
    }

     public function collection()
    {	//$pro=['id','nombre','descripcion','stock'];
        // $pro=Productos::all();
        // return $pro;
    }

    public function view(): View
    {
        return view('excel.productos', [
            'pro' => $this->data
        ]);
    }

    // public function view(): View
    // {
    //     return view('excel.productos', [
    //         'pro' => Productos::all()
    //     ]);
    // }

}

