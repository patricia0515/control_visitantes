@extends('layouts.plantilla')
@section('content')

    <div class="card-table">
        <table id="tableVisitor" class="table table-striped table-hover table-responsive-lg" style="width:100%">
            <caption>
                <span id="visitantes-total">{{ $visitantes->total() }}</span> registro |
                p&aacute;gina {{ $visitantes->currentPage() }} de {{ $visitantes->lastPage() }}
            </caption>
            
            <thead class="text-center" style="border-bottom: 2px solid #e7e7e7;  border-top: 2px solid #e7e7e7;">
                <tr>
                    <th>Visitas</th>
                    <th>Empresa</th>
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>Tel&eacute;fono</th>
                    <th>RH</th>
                    <th>EPS</th>
                    <th>C&eacute;dula</th>
                </tr>
            </thead>
            <tbody class="text-center">
                @foreach($visitantes as $visitante)
                <tr>
                    <td>{{ $visitante->visitas }}</td>
                    <td>{{ $visitante->empresa }}</td>
                    <td>{{ $visitante->nombre }}</td>
                    <td>{{ $visitante->apellido }}</td>
                    <td>{{ $visitante->contacto }}</td>
                    <td>{{ $visitante->rh }}</td>
                    <td>{{ $visitante->eps }}</td>
                    <td>{{ $visitante->documento }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
   
    <div class="row" align="left">
        <div class="pull-right">
            <a class="btn btn-success" href="{{ route('visitantes.create')}}">Nuevo</a>
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
