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
        <p>{{$info['nombreCliente']}}</p>
        <p>{{$info['fechaNacimiento']}}</p>
        <p>{{$info['estadoCivil']}}</p>
        <p>{{$info['telefono']}}</p>
        <p>{{$info['sexo']}}</p>
    </section>


    <section id="Antecedentes">
        <h1> Ficha de Identificación</h1>
        <p>{{$historia['antecedentes'][accidentes]}}</p>
        <p>{{$historia['antecedentes'][enfermedadesInfancia]}}</p>
        <p>{{$historia['antecedentes'][alergias]}}</p>
        <p>{{$historia['antecedentes'][inmunizacion]}}</p>
    </section>

    <section id="Fisiología">
    <h1> Fisiología</h1>
        <p>{{$historia['fisiologica'][latancia]}}</p>
        <p>{{$historia['fisiologica'][iniciacionSexual]}}</p>
        <p>{{$historia['fisiologica'][ginecoObstretico]}}</p>
        <p>{{$historia['fisiologica'][menarca]}}</p>
        <p>{{$historia['fisiologica'][embarazos]}}</p>
        <p>{{$historia['fisiologica'][partos]}}</p>
        <p>{{$historia['fisiologica'][abortos]}}</p>
    </section>

    <a href="{{ route('downloadPDF') }}"> Imprimir PDF</a>

</body>
</html>