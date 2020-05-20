<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
       
        <title>QOAJAD</title>
        
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <!-- FONT AWESOME -->
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('css/main.css') }}">
        <link rel="stylesheet" href="{{ asset('css/citas.css') }}">
        <link rel="stylesheet" href="{{ asset('css/main/contenido.css') }}">
        <link rel="stylesheet" href="{{ asset('css/main/menuLateral.css') }}">
        <link rel="stylesheet" href="{{ asset('css/main/menu.css') }}">
        <!-- PERFIL CSS-->
        <link rel="stylesheet" href="{{ asset('css/perfil.css') }}">
        <link rel="stylesheet" href="{{ asset('css/form.css') }}">


        <!-- Evento cita calendario -->
        <link rel="stylesheet" href="//code.jquery.com/ui/1.12.0/themes/base/jquery-ui.css">
        <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
        <script src="https://code.jquery.com/ui/1.12.0/jquery-ui.js"></script>

        <script>
                $( function(){

                    // An array of dates
                    var eventDates = {};
                    eventDates[ new Date( '08/07/2020' )] = new Date( '08/07/2022' );
                    eventDates[ new Date( '08/12/2020' )] = new Date( '08/12/2021' );
                    eventDates[ new Date( '08/18/2021' )] = new Date( '08/18/2027' );
                    eventDates[ new Date( '08/23/2023' )] = new Date( '08/23/2028' );
             
                    $('#datepicker').datepicker({
                        beforeShowDay: function( date ) {
                        var highlight = eventDates[date];
                        if( highlight ) {
                            return [true, "event", 'Tooltip text'];
                        } else {
                            return [true, '', ''];
                        }
                    }
                });
            });            
        </script>

    </head>

    <body>        

 
        <section id="HomePage">

            <!--- MENÚ DE ARRIBA --->
            <div class="bloque"></div>
            <header>
                <ul>         

                

                    <li> <a href="{{ route('inicio') }}">Inicio</a></li>
                    <li><a href="{{ route('citasIndex') }}">Citas</a>

                        <ul>
                            <li ><a href="{{ route('crearCita') }}">Crear cita</a></li>
                            <li><a href="{{ route('verCita') }}">Ver citas</a></li>
                            <li><a href="{{ route('borrarCita') }}">Modificar  borrar cita</a></li>
                        </ul>           
                    </li>

                    <li id="historia"><a href="{{route('historia')}}">Historia Clínica</a></li>    
                    </ul>
               
                </ul>

            </header>

            <!--- MENÚ LATERAL -->
            <nav>
                <div id="logo"><div></div>
                </div> 

                <h1>EPS VALLEDEV</h1>
                <a href="{{ route('perfil') }}">  
                <i class="fas fa-user-cog"></i>
                </a>

                <a href="{{ route('cerrar') }}">  
                    <div>Cerrar sesión</div>
                </a>
                

                <!--- CALENDARIO -->

                    <!-- <div id="cal"> -->
                <div id="datepicker"></div>

                

            </nav>
            
            <!--- CONTENIDO PRINCIPAL -->

            <main id="main">
                @yield('content')
            </main>

        </section>

    </body>

</html>