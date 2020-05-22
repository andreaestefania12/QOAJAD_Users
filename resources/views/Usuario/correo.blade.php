@extends('main')

@section('content')


<div id="boxCrear">
		<div id="title">
			Cambiar correo 
		</div>

		<form   action ="{{ action('UsuarioController@setUsuario')}}" method="put">
			<section id= "Form"> 
				
				<h1>Correo actual : {{$user->username}}</h1>
				<h1>Ingrese el nuevo correo: 
				<input type="email" name="username" id="email" placeholder="Correo electrónico" required></h1>
				<input type="submit" name="enviar" value="Confirmar"/>

			</section>
		

		</form>		
	
</div>
	
    
@endsection