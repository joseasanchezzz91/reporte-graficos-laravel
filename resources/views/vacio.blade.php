@extends('layout')
@section('content')
<div class="container">
    <form method="post"  action="{{route('import')}}" enctype="multipart/form-data">
        {{csrf_field()}}
      	<div class="form-group">
         	<label for="exampleFormControlFile1">Suba el Archivo a Importar</label>
       		 <input type="file" name="excel">
        	<br><br>
        	<input class="btn btn-primary" type="submit" value="Enviar" style="padding: 10px 20px;">
   	 	</div>
    </form>
</div>
@endsection