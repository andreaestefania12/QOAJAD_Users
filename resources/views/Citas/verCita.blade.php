@extends('main')

@section('content')
	<div id="boxCrear">
	<div id="title">
		Todas las citas
	</div>
	<div id="content">
		@foreach ($lista as $list)
			<div class="boxCitas">
				<div> Fecha: {{ $list->date }}</div>
				<div> IPS: {{ $list->healthProviderInstitute }}</div>
				<div> Dirección: {{ $list->address }}</div>
				<div> Doctor: {{ $list->doctorName }}</div>
				<div> Especialidad: {{ $list->specialty }}</div>	
			</div>			
			
		@endforeach
	</div>
	
</div>
   
@endsection