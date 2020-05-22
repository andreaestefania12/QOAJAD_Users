@extends('main')

@section('content')
	<div id="boxCrear">
	<div id="title">
		Seleccione la cita que desea editar
	</div>
	<div id="content">
		@foreach ($lista as $list)
		<a href="{{ route('modificar',$list->id) }}">
			<div class="boxCitas">
				<div> Fecha: {{ $list->date }}</div>
				<div> IPS: {{ $list->healthProviderInstitute }}</div>
				<div> Dirección: {{ $list->address }}</div>
				<div> Doctor: {{ $list->doctorName }}</div>
				<div> Especialidad: {{ $list->specialty }}</div>	
			</div>			
			</a>
		@endforeach
	</div>
    
@endsection