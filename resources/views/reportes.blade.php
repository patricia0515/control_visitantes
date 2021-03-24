@extends('layouts.plantilla')

@section('content')
<br>
<div class="col-6">
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-12">
                    <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
                        <div class="carousel-inner">
                          <div class="carousel-item active">
                            <img src="storage/img/DHPYUe0NrdNWZ0eRZ1ChyMv39JJhP53Tn6qTncIk.png" class="d-block w-100" alt="...">
                          </div>
                          <div class="carousel-item">
                            <img src="storage/img/DHPYUe0NrdNWZ0eRZ1ChyMv39JJhP53Tn6qTncIk.png" class="d-block w-100" alt="...">
                          </div>
                          <div class="carousel-item">
                            <img src="storage/img/DHPYUe0NrdNWZ0eRZ1ChyMv39JJhP53Tn6qTncIk.png" class="d-block w-100" alt="...">
                          </div>
                        </div>
                        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls"  data-bs-slide="prev">
                          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                          <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls"  data-bs-slide="next">
                          <span class="carousel-control-next-icon" aria-hidden="true"></span>
                          <span class="visually-hidden">Next</span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<br>
<div class="container">
    <div class="row">
        <div class="col-6">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="graficabarras">
                            <h3>Control Acceso Visitantes</h3>
                            <div id="chart" style="height: 300px;"></div>         
                        </div>
                    </div>
                </div>
            </div>
            <br>
        </div>
        <div class="col-6">
            <!--Card-->
            <div class="card mb-4">
                <!--Card content-->
                <div class="card-body">

                    <div class="excel">
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
                    </div>
                    
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




<br>

{{-- AQUI COPIO EL CODIGO --}}

@endsection


@section('script')

    <!-- Charting library -->
    <script src="https://unpkg.com/echarts/dist/echarts.min.js"></script>
    <!-- Chartisan -->
    <script src="https://unpkg.com/@chartisan/echarts/dist/chartisan_echarts.js"></script>

    <script>
    const chart = new Chartisan({
        /* llamo el id del div que contiene mi grafica */
        el: '#chart',
       /*  llamo la ruta con  la clase de la grafica que cree en app/Charts/ReportChart */
        url: "@chart('report_chart')",
    });
    </script>

    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js"></script>

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