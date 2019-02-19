@extends('layout')
@section('title')
Listado de productos
@endsection
@section('content')
<h1 class="page-header">Listado de productos</h1>
   
    <div>
       {!! $chart->container() !!}

    </div>

    <hr>
    <p>
        <a href="{{ route('productos.pdf') }}" class="btn btn-sm btn-primary">
            Descargar productos en PDF
        </a>
        <a href="{{ route('productos.excel') }}" class="btn btn-sm btn-success">
        	Descargar Productos en Excel
        </a>
        <a href="{{ route('vista-import-excel') }}" class="btn btn-sm btn-danger">
            Importar Archivo Excel 
        </a>
    </p>
    {!! $chart->script() !!}
@endsection
