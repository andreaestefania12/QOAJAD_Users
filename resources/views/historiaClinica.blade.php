<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Historia Clinica</title>
</head>
<body>
	<section id="InfoPers">
        <h1>Información Personal</h1>
        <p>Cédula : {{$usuario->identificacion}}</p>
        <p>Nombre: {{$usuario->nombrePaciente}}</p>
        <p>Fecha de Nacimiento:{{$usuario->fechaNacimiento}}</p>
        <p>Estado Civil: {{$usuario->estadoCivil}}</p>
        <p>Teléfono: {{$usuario->telefono}}</p>
        <p>Sexo: {{$usuario->sexo}}</p>
    </section>
	<section id="Antecedentes">
        <h1> Ficha de Identificación</h1>
	        
	        <p>Enfermedades Infancia: {{$historia->antecedentes->enfermedadesInfancia}}</p>
	        <p>Alergias: {{$historia->antecedentes->alergias}}</p>
        	<p>Inmunización: {{$historia->antecedentes->inmunizacion}}</p>

    </section>

    <section id="Fisiología">
    <h1> Fisiología</h1>
        <p>Lactancia: {{$historia->fisiologica->lactancia}}</p>
        <p>Edad de iniciación sexual: {{$historia->fisiologica->iniciacionSexual}}</p>
        <p>Gineco obstretico{{$historia->fisiologica->ginecoObstretico}}</p>
        <p>Menarca: {{$historia->fisiologica->menarca}}</p>
        <p>Embarazo:{{$historia->fisiologica->embarazos}}</p>
        <p>Partos:{{$historia->fisiologica->partos}}</p>
        <p>Abortos:{{$historia->fisiologica->abortos}}</p>
    </section>
        

</body>
</html>