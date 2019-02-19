<?php

namespace App\Imports;

use App\Productos;
use Maatwebsite\Excel\Concerns\ToModel;

class ProductosImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Productos([
            // 'Id'=>$row[0],
            'nombre'=> $row[1],
            'descripcion'=> $row[2],
            'stock'=> $row[3],
            //
        ]);
    }


}
