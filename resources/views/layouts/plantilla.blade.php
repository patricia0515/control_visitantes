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
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Condensed:wght@300;700&display=swap" rel="stylesheet">

    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.css">
    
    <!-- Icons -->
    <script src="https://kit.fontawesome.com/f89bfe8215.js" crossorigin="anonymous"></script>

    <!-- Datatables -->
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.js"></script>
</head>

<body>
    <div class="hero">
        <!-- header -->
        <div class="header">
            <div class="title-header">
                <div class="title-icon">
                    <i  class="fas fa-bars"></i>
                </div>
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
                    <li><a href="{{ route('index')}}"><i class="cont-icons fas fa-home"></i>inicio</a></li>
                    <li><a href="{{ route('visitor')}}"><i class="cont-icons fas fa-book-open"></i>visitantes</a></li>
                    <li><a href="{{ route('visits')}}"><i class="cont-icons fas fa-book"></i>registros visitas</a></li>
                </ul>
            </div>
        </div> 

        <!-- content -->   
        <div class="content">
            <!-- <img src="SharedScreenshot.jpg" alt=""> -->
            <div class="card-hero">
            
                @yield('content')

            </div>
        </div>
    </div>

    @yield('modal')

    @yield('script')

</body>
</html>