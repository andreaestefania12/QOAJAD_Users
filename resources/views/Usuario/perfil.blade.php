@extends('main')

@section('content')
	<div id="boxCrear">
		<div id="title">
			Perfil
		</div>
		<div id="maincontent">
			<a href="{{ route('crearCita') }}">
			    <div class="box" id="crearCitas" >
			    	Correo electrónico 
			    </div>
		    </a>
		    <a href="{{ route('crearCita') }}">
			    <div class="box" id="crearCitas" >
			    	Contraseña:
			    </div>
		    </a>
		</div>
	
	</div>
    
@endsection