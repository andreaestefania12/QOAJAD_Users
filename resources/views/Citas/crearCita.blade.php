@extends('main')

@section('content')

	<div id="boxCrear">
		<div id="title">
			Elegir una ips
		</div>
		<div id="content">
			   
			@foreach ($ipslist as $ips)
				<a href="{{ route('ipsCita',$ips->name) }}">
					<div class="boxIPS">
						<div> Nombre: {{ $ips->name }}</div>
						<div> Dirección: {{ $ips->streetAddress }}</div>
					</div>
				</a>
				
			@endforeach
		</div>
		
	</div>
	
    
@endsection