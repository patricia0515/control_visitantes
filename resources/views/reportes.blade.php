@extends('layouts.plantilla')

@section('content')
<br>
<div class="col-11">
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div>
                    <h4 class="text-center">Aqui va el carrusel</h4>
                </div>
            </div>
        </div>
    </div>
</div>
<br>
<div class="container">
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div>
                            <h4 class="text-center">Aqui va la gráfica</h4>            
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col">
            <!--Card-->
            <div class="card mb-4">
                <!--Card content-->
                <div class="card-body">
                    <form action="{{ route('visitas.excel')}}" method="POST">
                        @csrf
                        <div class="panel panel-primary" style="border-color: #227547;">
                            <div class="panel-heading" style="background: #227547; border-color: #227547;">
                                <i class="fa fa-download"></i><i class="text">Reporte Excel</i> 
                            </div>
                            <div class="panel-body" style="font-size: x-small;">
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-sm-12">
                                        <img src="imagenes/logo-excel.png" alt="excel" width="100" height="50">
                                        </div>
                                        <br>
                                        <div class="col-sm-12">
                                            <div class="col-sm-6"><b>Fecha inicial:</b>
                                                <input name="fecha_inicial" type="date" class="form-control" id="datepicker" required="">
                                            </div>
        
                                            <div class="col-sm-6"><b>Fecha Final:</b>
                                                <input name="fecha_final" type="date" class="form-control" id="datepicker2" required="">
                                            </div>
                                        </div>
                                        <!-- <div class="col-sm-3"></div> -->
                                    </div>
                                </div>
                                <div class="row">
        
                                    <div class="col-sm-12">
                                        <br>
                                        <span class="waves-input-wrapper waves-effect waves-light"><input type="submit" name="Filtrar" value="Descargar" class="btn  btn-susess btn-block" style="background-color:#227547;"></span>
                                    </div>
        
                                </div>
                            </div>
                        </div>
                    </form>
        
                    <!-- <canvas id="pieChart"></canvas> -->
        
                </div>
        
            </div>
            <!--/.Card-->
        
            <!--Card-->
            <div class="card mb-4">
        
                <!--Card content-->
                <div class="card-body">
        
                    <!-- List group links -->
                    <div class="list-group list-group-flush">
                        <a class="list-group-item list-group-item-action waves-effect">Total personas que
                            ingresaron:</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<br>
{{-- <div class="col-md-5 mb-4">
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div>
                    <h1>Hola Boton</h1>
                    <P>
                        Clic <a href=" {{ route('visitas.excel') }} ">aqui</a>
                        Para descargar en EXCEL las visitas
                    </P>
                </div>
            </div>
        </div>
    </div>
</div> --}}


<br>

{{-- AQUI COPIO EL CODIGO --}}


@endsection

{{-- scrit de la grafica --}}
{{-- <script>
    let ctx = document.getElementById("myChart").getContext('2d');
    let myChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: ["Total entrada", "Total salida", "Total registrados", "Activos", "Inactivos", "Total áreas visitadas"],
            datasets: [{
                label: '#Control Acceso Visitantes ',
                
                data:
                [
                    ,
                    , 
                    ,
                    , 
                    ,
                                                                ],                                           

                backgroundColor: [
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(255, 206, 86, 0.2)',
                    'rgba(75, 192, 192, 0.2)',
                    'rgba(153, 102, 255, 0.2)',
                    'rgba(255, 159, 64, 0.2)'
                ],
                borderColor: [
                    'rgba(255,99,132,1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(153, 102, 255, 1)',
                    'rgba(255, 159, 64, 1)'
                ],
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true
                    }
                }]
            }
        }
    });
    </script> --}}

@section('script')

    <!-- Boostrap-->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.6.0/dist/umd/popper.min.js"
        integrity="sha384-KsvD1yqQ1/1+IA7gi3P0tyJcT3vR+NdBTt13hSJ2lnve8agRGXTTyNaBYmCR/Nwi"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.min.js"
        integrity="sha384-nsg8ua9HAw1y0W1btsyWgBklPnCUAFLuTMS2G72MMONqmOymq585AcH49TLBQObG"
        crossorigin="anonymous"></script>
    <!-- SweetAlert -->
    <script src="{{ asset('assets/sweetAlert2/sweetalert2.all.min.js')}}"></script>
    <!-- Scripts -->
    <script src="{{ asset('js/script.js') }}"></script>

@endsection