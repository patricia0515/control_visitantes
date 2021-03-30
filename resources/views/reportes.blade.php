@extends('layouts.plantilla')

@section('content')
    <br>
    <h1 class="title-report">control de acceso visitantes supervisor</h1>
    <br>
    <div class="container">
        <div class="row">
            <div class="col-6">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
                                <div class="carousel-inner" id="inner"></div>
                                <button class="carousel-control-prev" type="button"
                                    data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                    <span class="visually-hidden">Previous</span>
                                </button>

                                <button class="carousel-control-next" type="button"
                                    data-bs-target="#carouselExampleControls" data-bs-slide="next">
                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                    <span class="visually-hidden">Next</span>
                                </button>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-6">
                <!--Card-->
                <div class="card mb-4">
                    <!--Card content FORMULARIO EXCEL-->
                    <div class="card-body ">

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
                                                        <input name="fecha_inicial" type="date" class="form-control"
                                                            id="datepickerInicio" required="">
                                                    </div>
                                                    <div class="col-sm-6"><b>Fecha final:</b>
                                                        <input name="fecha_final" type="date" class="form-control"
                                                            id="datepickerFin" required="">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <br>
                                                <span class="waves-input-wrapper waves-effect waves-light">
                                                    <input type="submit" name="Filtrar" value="Descargar"
                                                        class="btn  btn-susess btn-block" id="btnFiltroGrafica"
                                                        style="background-color:#227547;">
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!--Card-->
                <div class="card mb-4">
                    <!--Card content-->
                    <div class="card-body">

                        <!-- List group links -->
                        <div class="list-group list-group-flush">
                            <a class="list-group-item list-group-item-action waves-effect title-total">Total personas que
                                ingresaron en los &uacute;ltimos 30 d&iacute;as:</a>
                            <input type="text" id="num_personas" name="num_personas" class="form-control col-md-3" readonly>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <br>
        <div class="row">
            {{-- Grafica --}}
            <div class="col-6">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <h1 class="text-center title-graph">Reporte &uacute;ltimos 30 d&iacute;as visitas</h1>
                            <div class="graficaDona">
                                <canvas id="myChart2" width="400" height="570"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-6">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="graficabarras">
                                <canvas id="myChart" width="400" height="400"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <br>
@endsection

@section('script')
    <!-- ChartJS-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.min.js" charset="utf-8"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js"></script>
    <!-- Boostrap-->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.6.0/dist/umd/popper.min.js" integrity="sha384-KsvD1yqQ1/1+IA7gi3P0tyJcT3vR+NdBTt13hSJ2lnve8agRGXTTyNaBYmCR/Nwi" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.min.js" integrity="sha384-nsg8ua9HAw1y0W1btsyWgBklPnCUAFLuTMS2G72MMONqmOymq585AcH49TLBQObG" crossorigin="anonymous"></script>
    <!-- SweetAlert -->
    <script src="{{ asset('assets/sweetAlert2/sweetalert2.all.min.js')}}"></script>
    <!-- Scripts -->
    <script src="{{ asset('js/reportes.js') }}"></script>
@endsection