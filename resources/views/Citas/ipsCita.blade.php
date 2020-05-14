@extends('main')

@section('content')
	<a> CREAR CITA</a>
	<h4>Eliga una especialización</h4>

	@foreach ($espelist as $esp)
		<div >{{ $esp->name }}</div>
		<div> Especialidades {{ $esp->specialties }}</div>
		
	@endforeach
@endsection
