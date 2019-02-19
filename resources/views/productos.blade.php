@extends('layout')
@section('title')
Listado de productos
@endsection
@section('content')
<h1 class="page-header">Listado de productos</h1>
    <table class="table table-hover table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Producto</th>
                <th>Descripción</th>
                <th>Stock</th>
            </tr>                            
        </thead>
        <tbody>
            @foreach($pro as $product)
            <tr>
                <td>{{ $product->id }}</td>
                <td>{{ $product->nombre }}</td>
                <td>{{ $product->descripcion }}</td>
                <td class="text-right">{{ $product->stock }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
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
@endsection
