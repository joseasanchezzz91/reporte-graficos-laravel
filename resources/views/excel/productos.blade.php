<h1 class="page-header text-center">Listado de productos</h1>
<table class="table table-hover table-striped">
	<thead>
		<tr>
			<h1>
				
			<th>ID</th>
			</h1>
			<th><h3>Nomnbre</h3></th>
			<th><h3>Descripcion</h3></th>
			<th><h3>Stock</h3></th>
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