@extends('main')

@section('content')
<div id="boxCrear">
		<div id="title">
			Cambiar Contraseña 
		</div>
		<form action ="{{ action('UsuarioController@setContr')}}" method="put">
			
			<input id= "contra" type="text" name="contra" placeholder="Contraseña nueva">
			
			<input type="submit" name="submit" value ="Confirmar">
		    </form>		
	
	</div>
	
    
@endsection