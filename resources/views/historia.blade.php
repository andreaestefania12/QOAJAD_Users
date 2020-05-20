@extends('main')

@section('content')
	<div id="boxCrear">
		<div id="title">
			Descargar historia clínica en PDF
		</div>
		
		<div id="maincontent">
		    <a href="{{ route('downloadPDF') }}">
			    <div class="box" id="crearCitas" >
			    	Descargar PDF:
			    </div>
		    </a>
		</div>
	
	</div>
    
@endsection