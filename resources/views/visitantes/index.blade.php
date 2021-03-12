@extends('layouts.plantilla')
@section('content')
<h1>Esta es la vista Index(Listar) Visitantes</h1>
<div class="container">

    {{-- Si esxiste un mensaje lo imprime por pantalla --}}
    @if ($message = Session::get('success')) 
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

        {{ $visitantes->links() }}
    </div>
    <div class="row">
        <div class="col-xl-12">
            <div class="table-resposive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Visitas</th>
                            <th>Empresa</th>
                            <th>Nombre</th>
                            <th>Apellido</th>
                            <th>Telefono</th>
                            <th>Rh</th>
                            <th>Eps</th>
                            <th>Documento</th>
                        </tr>
                    </thead>
                    <tbody>
                         	
                        
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
