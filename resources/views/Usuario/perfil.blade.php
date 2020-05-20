@extends('main')

@section('content')
	<div id="boxCrear">
		<div id="title">
			Bienvenido {{$user->username}} Cambiar? 
		</div>
		<div>Elige el elemento que desee modificar</div>
		<div id="maincontent">
			<a href="{{ route('usuario') }}">
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