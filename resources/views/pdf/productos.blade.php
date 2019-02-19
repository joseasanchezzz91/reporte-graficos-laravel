@extends('layout')
@section('content')
<h1 class="page-header text-center">Listado de productos</h1>
<table class="table table-hover table-striped">
	<thead>
		<tr>
			<th>Id</th>
			<th>Nombre</th>
			<th>Descripcion</th>
			<th>Stock</th>
		</tr>
	</thead>
	<tbody>
		@foreach ($pro as $p)
		<tr>
			<td>{{$p->id}}</td>
			<td>{{$p->nombre}}</td>
			<td>{{$p->descripcion}}</td>
			<td class="text-right">{{$p->stock}}</td>
		</tr>
		@endforeach
	</tbody>
	
</table>
@endsection