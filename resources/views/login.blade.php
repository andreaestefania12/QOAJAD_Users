<!DOCTYPE html>
<html lang="en">
    <head>
         <!-- Title Page-->
    <title>Login</title>

    <!-- Icons font CSS-->
    <link href="vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">
    <link href="vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <!-- Font special for pages-->
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i" rel="stylesheet">    
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  

    <!-- Main CSS-->
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">


</head>

<body>
    @include('sweetalert::alert')
    <div class="page-wrapper p-t-180 p-b-100 font-robo">
        <div class="wrapper wrapper--w960">
            <div class="card card-2">
                <div class="card-heading"></div>
                <div class="card-body">
                    <h2 class="title">Iniciar Sesión</h2>
                    <form action ="{{ action('LoginController@index')}}" method="get">

                        <div class="row row-space">
                            <div class="input-group">
                                <input class="input--style-2" type="text" placeholder="Usuario" name="user">
                            </div>
                        </div>

                        <div class="row row-space">
                            <div class="col-2">
                                <div class="input-group">
                                     <input class="input--style-2" type="password" placeholder="Contraseña" name="passw">
                                </div>
                            </div>
                        </div>
                        <div class="registro">
                        Si no tienes cuenta, haz click en <a href="{{ route('registro') }}">Registrar</a>
                        </div>

                        <div class="p-t-30">
                             <button class="btn btn--radius" type="submit">Iniciar sesión</button>
                        </div>
                        

                    </form>
                </div>
            </div>
        </div>
    </div>

    </body>

</html>