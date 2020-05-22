@extends('main')

@section('content')

<div>
	<div class="boxCrear">
		<div id="title">
			Desea?
		</div>
	</div>
	
	<div id="maincontent">
		<a href="{{ route('actualizar') }}">
			<div class="box" id="crearCitas" >Editar cita</div>
		</a>
		<a href="{{ route('borrarCita') }}">
			<div class="box" id="crearCitas" >Borrar una cita</div>
		</a>
	</div>

</div> 
@endsection