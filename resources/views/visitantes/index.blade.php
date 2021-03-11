@extends('layouts.plantilla')
@section('content')
<h1>Esta es la vista Index de los Visitantes</h1>
<div class="container">
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

    </div>
</div>
@stop