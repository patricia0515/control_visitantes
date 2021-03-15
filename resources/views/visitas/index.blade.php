@extends('layouts.plantilla')
@section('content')

    <div class="card-table">
        <table id="tableVisitor" class="table table-striped table-hover table-responsive-lg" style="width:100%">
            <caption>
                <span id="visitas-total">{{ $visitas->total() }}</span> registro |
                p&aacute;gina {{ $visitas->currentPage() }} de {{ $visitas->lastPage() }}
            </caption>
            <thead class="text-center" style="border-bottom: 2px solid #e7e7e7;  border-top: 2px solid #e7e7e7;">
                <tr>
                    <th>Cantidad</th>
                    <th>C&eacute;dula</th>
                    <th>Fecha</th>
                    <th>Registro de pertenencias</th>
                    <th>serial</th>
                    <th>Sede</th>
                    <th>Motivo</th>
                    <th>Tipo de visitante</th>
                    <th>Visita a</th>
                    <th>Veh&iacute;culo</th>
                    <th>Imagen ve&iacute;culo</th>
                </tr>
            </thead>
            <tbody class="text-center">
                @foreach($visitantes as $visitante)
                <tr>
                    <td>{{ $visitante->cedula }}</td>
                    <td>{{ $visitante->fecha }}</td>
                    <td>{{ $visitante->registro_de_pertencias }}</td>
                    <td>{{ $visitante->serial }}</td>
                    <td>{{ $visitante->sede }}</td>
                    <td>{{ $visitante->motivo }}</td>
                    <td>{{ $visitante->tipo_de_visitante }}</td>
                    <td>{{ $visitante->visita }}</td>
                    <td>{{$visitante->vehiculo}}</td>
                    <td>{{$visitante->imagen_vehiculo}}</td>
                </tr>
                @endforeach
            </tbody>
        </table>

        {{ $visitas->links() }}
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