@extends('main')

@section('content')




<div>
	<div class="boxCrear">
		<div id="title">
			Bienvenido {{$user->nombreCliente}}  
		</div>
	</div>

	<section id="Info">
		<p>Estado civil : {{$user->estadoCivil}}</p>
		<p>Telefono: {{$user->telefono}} </p>
		<p>Sexo: {{$user->sexo}} </p>
	</section>
	
	<h2 id="Mensaje">Elige el elemento que desee modificar</h2>
	
	<div id="maincontent">
		<a href="{{ route('usuario') }}">
			<div class="box" id="crearCitas" >Correo electrónico</div>
		</a>
		<a href="{{ route('contra') }}">
			<div class="box" id="crearCitas" >Contraseña:</div>
		</a>
	</div>

</div> 
@endsection