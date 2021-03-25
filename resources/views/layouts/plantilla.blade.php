<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Gesti&oacute;n Visitantes</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
   
    <!-- Jquery -->
    <script src=" {{ asset('assets/jQuery/jquery-3.6.0.min.js')}}"></script>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Condensed:wght@300;700&display=swap" rel="stylesheet">

    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/datatables/css/jquery.dataTables.min.css') }}">
    
    <!-- Icons -->
    <script src="{{ asset('assets/fontawesome/a89513e471.js') }}" crossorigin="anonymous"></script>

    <!-- Datatables -->
    <script type="text/javascript" charset="utf8" src="{{ asset('assets/datatables/js/jquery.dataTables.min.js') }}"></script>
    <script type="text/javascript" charset="utf8" src="{{ asset('assets/datatables/js/dataTables.responsive.js') }}"></script>

</head>

<body>
    <div class="hero">
        <!-- header -->
        <div class="header">
            <div class="title-header">
                <h2>Sistema control de visitas</h2>
            </div>
        </div>

        <!-- menu -->
        <div class="menu">
            <div class="menu-header">
                <i class="far fa-eye"></i>
                <h3>Sistema de visitas</h3>
            </div>
            <div class="menu-option">
                <div class="menu-option-title">
                    <h4>navegaci&oacute;n</h4>
                </div>
                <ul class="menu-list">
                    <li><a class="none"href="{{ route('index')}}"><i class="cont-icons fas fa-home"></i>inicio</a></li>
                    <li><a class="none"href="{{ route('visitor')}}"><i class="cont-icons fas fa-book-open"></i>visitantes</a></li>
                    <li><a class="none"href="{{ route('visits')}}"><i class="cont-icons fas fa-book"></i>registros visitas</a></li>
                </ul>
            </div>
            <input type="hidden" name="">
        </div> 

        <!-- content -->   
        <div class="content">
            <div class="card-hero">
            
                @yield('content')

            </div>
        </div>
    </div>

    <div class="texto">
        <div id="footer" class="text-center">© Desarrollado con el ♥ por Montechelo</div>
    </div>
    

    @yield('modal')

    @yield('script')


    <!--Bootstrap JS-->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.6.0/dist/umd/popper.min.js" integrity="sha384-KsvD1yqQ1/1+IA7gi3P0tyJcT3vR+NdBTt13hSJ2lnve8agRGXTTyNaBYmCR/Nwi" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.min.js" integrity="sha384-nsg8ua9HAw1y0W1btsyWgBklPnCUAFLuTMS2G72MMONqmOymq585AcH49TLBQObG" crossorigin="anonymous"></script>
</body>
</html>