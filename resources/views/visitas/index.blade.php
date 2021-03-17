@extends('layouts.plantilla')
@section('content')

    <div class="card-table">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="table-responsive mt-4 mb-4">
                        <table id="tableVisitas" class="table  table-hover table-borderless" style="width:100%">
                            <thead class="text-center">
                                <tr>
                                    <th>Cantidad</th>
                                    <th>C&eacute;dula</th>
                                    <th>Fecha</th>
                                    <th>Registro de pertenecias</th>
                                    <th>serial</th>
                                    <th>&Aacute;rea</th>
                                    <th>Motivo</th>
                                    <th>Descripci&oacute;n</th>
                                    <th>Visita a</th>
                                    <th>Tipo</th>
                                    <th>Imagen Veh&iacute;culo</th>
                                </tr>
                            </thead>
                            <tbody class="text-center">
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('script')

    <!-- Boostrap-->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.6.0/dist/umd/popper.min.js" integrity="sha384-KsvD1yqQ1/1+IA7gi3P0tyJcT3vR+NdBTt13hSJ2lnve8agRGXTTyNaBYmCR/Nwi" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.min.js" integrity="sha384-nsg8ua9HAw1y0W1btsyWgBklPnCUAFLuTMS2G72MMONqmOymq585AcH49TLBQObG" crossorigin="anonymous"></script>
    <!-- SweetAlert -->
    <script src="{{ asset('assets/sweetAlert2/sweetalert2.all.min.js')}}"></script>
    <!-- Scripts -->
    <script src="{{ asset('js/script.js') }}"></script>

@endsection