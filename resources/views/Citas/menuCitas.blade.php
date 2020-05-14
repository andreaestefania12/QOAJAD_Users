@extends('main')

@section('content')
	<div id="menuCitas">
		<div id="verCitas">
			<a href="{{ route('verCita') }}">VER CITAS</a>     		
	    </div>

	    <div id="crearCitas" >
	    	<a href="{{ route('crearCita') }}">CREAR CITA</a> 
	    </div>

	    <div id="borrarCitas">
	    	<a href="{{ route('borrarCita') }}">BORRAR CITA</a> 
	    </div>
	</div>
    
@endsection