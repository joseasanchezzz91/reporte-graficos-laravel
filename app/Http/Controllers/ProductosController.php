<?php

namespace App\Http\Controllers;

use App\Productos;
use Illuminate\Http\Request;
use App\Exports\ProductosExport;
use App\Imports\ProductosImport;
use App\Exports\ProductosExportView;
use Maatwebsite\Excel\Facades\Excel;
use App\Charts\SampleChart;
use App\Categoria;

use Barryvdh\DomPDF\Facade as PDF;


class ProductosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pro=Productos::all();
        return view('productos',compact('pro'));
    }

    public function pdf(){

        $pro=Productos::all();

        $pdf= PDF::loadView('pdf.productos',compact('pro'));

        return $pdf->download('listado.pdf');

    }


     public function excel(){
        $data=Productos::all();
      
      return Excel::download(new ProductosExport, 'Productos.xlsx');
     // return Excel::download(new ProductosExportView($data), 'Productos.xlsx');

       }

       public function cargarexcel(){
        return view('vacio');
       }

       public function import(Request $request)
{
    /*\Excel::load($request->excel, function($reader) {

        $excel = $reader->get();

        // iteracción
        $reader->each(function($row) {

            $p = new Productos;
            $p->id=$row->id;
            $p->name = $row->nombre;
            $p->descripcion = $row->descripcion;
            $p->stock = $row->stock;
            $p->save();

        });
    
    });*/

    

    $p=Excel::toCollection(new ProductosImport, $request->file('excel'));
  
   foreach ($p as $k) {
       # code...
    $pr=new Productos;
   
   
    $pr->nombre=$k[1];
    $pr->descripcion=$k[2];
    $pr->stock=$k[3];
    // $pr->create_at=0;
    // $pr->update_at=0;
    $pr->save();
    // $pp=$pr;
   }
    // $pro=Productos::all();

    return view('subida-excel',compact('pp'));
}

        public function grafico(){
 $today_users = Productos::whereDate('created_at', today())->count();
$yesterday_users = 4; //User::whereDate('created_at', today()->subDays(1))->count();
$users_2_days_ago = 6;//Categoria::whereDate('created_at', today()->subDays(2))->count();

$chart = new SampleChart;
$chart->labels(['2 days ago', 'Yesterday', 'Today']);
$chart->dataset('My dataset', 'pie', [$users_2_days_ago, $yesterday_users, $today_users])->backgroundColor(collect(['#7158e2','#3ae374', '#ff3838']))->color(collect(['#7d5fff','#32ff7e', '#ff4d4d']));

        
        return view('grafica', compact('chart'));

        }
////////////////////////////
        //LIBRERIA PARA LOS GRAFICOS
        //https://charts.erik.cat/render_charts.html#render-the-container

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Productos  $productos
     * @return \Illuminate\Http\Response
     */
    public function show(Productos $productos)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Productos  $productos
     * @return \Illuminate\Http\Response
     */
    public function edit(Productos $productos)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Productos  $productos
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Productos $productos)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Productos  $productos
     * @return \Illuminate\Http\Response
     */
    public function destroy(Productos $productos)
    {
        //
    }


/*iNSTALACION DE Maatwebsite Y COMANDO PARA Exports E IMPORTAR
PASO 1 EN CONFIG/APP.php
composer require maatwebsite/excel
PASO 2 PEGAR EN
'providers' => [
    Maatwebsite\Excel\ExcelServiceProvider::class,
]
PASO 3 PEGAR EN ALIAS
'aliases' => [
    ...
    'Excel' => Maatwebsite\Excel\Facades\Excel::class,
]

//PARA CREAR LOS IMPORTADORES Y EXPORTADORES (SE PUEDE CON VISTA)
php artisan make:export UsersExport --model=User
 // DOCUMENTACION DE LA IMPORTACION
    // https://medium.com/maatwebsite/introducing-laravel-excel-3-1-e478502bf92e
*/


}
