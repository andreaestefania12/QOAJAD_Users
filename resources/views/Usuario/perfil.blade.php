@extends('main')

@section('content')
	<div id="boxCrear">
		<div id="title">
			Bienvenido {{$user->nombrePaciente}}  
		</div>
		</div>
		<div>Estado civil : {{$user->estadoCivil}}
		</div>
		<div>Telefono: {{$user->telefono}} </div>
		<div>Sexo: {{$user->sexo}} </div>



		<h2>Elige el elemento que desee modificar</h2>
		<div id="maincontent">
			<a href="{{ route('usuario') }}">
			    <div class="box" id="crearCitas" >
			    	Correo electrónico 
			    </div>
		    </a>
		    <a href="{{ route('contra') }}">
			    <div class="box" id="crearCitas" >
			    	Contraseña:
			    </div>
		    </a>
		</div>
	
	</div>
    
@endsection