@extends('main')

@section('content')

<div id="boxCrear">
	<div id="title">
		Eliga un horario
	</div>
	<div id="content">
		@foreach ($horarios as $hora)
			
			<h1 class="consult"> {{ $hora->name }}</h1>
				@foreach($hora->availableAppointment as $ava)
				<div class="boxIPS">
					<a href="{{ route('guardar',[$ava->doctorDocument,$ava->date]) }}">
						<div> Doctor: {{ $ava->doctorName }}</div>
						<div> Documento: {{ $ava->doctorDocument }}</div>
						<div> Fecha y hora: {{ $ava->date }}</div>				
					</a>
				</div>	
				@endforeach
					
			
		@endforeach
	</div>
	
</div>

@endsection
	