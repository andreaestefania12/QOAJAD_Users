<!DOCTYPE html>
<html lang="en">
    <head>
         <!-- Title Page-->
    <!-- Title Page-->
    <title>Registro</title>

    <!-- Icons font CSS-->
    <link href="vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">
    <link href="vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <!-- Font special for pages-->
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i" rel="stylesheet">

<meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Main CSS-->
    <link rel="stylesheet" href="{{ asset('css/registro.css') }}">
</head>

<body>
   @include('sweetalert::alert')
    <div class="page-wrapper p-t-180 p-b-100 font-robo">
        <div class="wrapper wrapper--w960">
            <div class="card card-2">
                <div class="card-heading"></div>
                <div class="card-body">
                    <h2 class="title">Registro</h2>
                    <form action ="{{ action('RegistroController@registrar')}}" method="post"> {{ csrf_field() }}
                        <div class="row row-space">
                            <div class="input-group">
                                <input class="input--style-2" type="text" placeholder="Usuario" name="usuario">
                            </div>
                        </div>

                        <div class="row row-space">
                            <div class="col-2">
                                <div class="input-group">
                                     <input class="input--style-2" type="password" placeholder="Contraseña" name="passw">
                                </div>
                            </div>
                        </div>

                        <div class="row row-space">
                            <div class="col-2">
                                <div class="input-group">
                                    <input class="input--style-2" type="text" placeholder="Número de documento" name="documento">
                                </div>
                            </div>
                        </div>

                        <div class="p-t-30">
                            <button class="btn btn--radius" type="submit">Registrarse</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
    </body>
</html>