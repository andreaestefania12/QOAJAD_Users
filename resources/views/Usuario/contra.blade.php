@extends('main')

@section('content')
<div id="boxCrear">
		<div id="title">
			Cambiar Contraseña 
		</div>
		<form action ="{{ action('UsuarioController@setContr')}}" method="put">
			
			<input type="text" name="contra" placeholder="Contraseña nueva">
			
			     <p><input type="submit" name="submit" value ="Confirmar"></p>
		    </form>		
	
	</div>
	
    
@endsection