@extends('main')

@section('content')
	<a> CREAR CITA</a>

	@foreach ($ipslist as $ips)
		<div>{{ $ips->name }}</div>
		<div> Dirección {{ $ips->streetAddress }}</div>
		
	@endforeach
    
@endsection