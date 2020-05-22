@extends('main')

@section('content')

<div id="boxCrear">
	<div id="title">
		Eliga una especialización
	</div>
	<div id="content">
		@foreach ($espelist as $esp)
			<div class="boxIPS">
			<div> {{ $esp->name }}</div>
				@foreach($esp->specialties as $spe)
					<a href="{{ route('actualizarHorario',[$ips,$spe->name]) }}">
						<div> Especialidades {{ $spe->name }}</div>
					</a>
				@endforeach
			</div>			
			
		@endforeach
	</div>
	
</div>

@endsection
