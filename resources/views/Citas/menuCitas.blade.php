@extends('main')

@section('content')
	<div id="maincontent">
		<a href="{{ route('verCita') }}">  
			<div class="box" id="verCitas">
				VER CITAS 						
		    </div>
	    </a> 

	    <a href="{{ route('crearCita') }}">
		    <div class="box" id="crearCitas" >
		    	CREAR CITAS 
		    </div>
	    </a>

	    <a href="{{ route('borrarCita') }}">
		    <div class="box" id="borrarCitas">
		    	MODIFICAR O BORRAR CITAS 
				
		    </div>
	    </a>
	</div>
    
@endsection