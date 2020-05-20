@extends('main')

@section('content')
<div id="boxCrear">
		<div id="title">
			Cambiar correo 
		</div>
		<form action ="{{ action('UsuarioController@setUsuario')}}" method="put">
			<div>Correo actual : {{$user->username}}</div>
			<div>Ingrese el nuevo correo: 
			<input type="text" name="username" placeholder="Correo electrónico"></div>
			
			     <p><input type="submit" name="submit" value ="Confirmar"></p>
		    </form>		
	
	</div>
	
    
@endsection