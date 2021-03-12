@extends('layouts.plantilla')

@section('namePage', 'Datos basicos visitantes')

@section('content')

<div class="container">
    <form action="" method="POST">
        @csrf
        <div class="row">
            <div class="col-md-12">
                <h3 class="text-center mt-5">Datos basicos</h3><br>
                <div class="row">
                    <div class="form-group col-6">
                        <label for="empresa">Empresa:</label>
                        <input type="text" class="form-control" name="empresa" disabled>
                    </div>
                    
                    <div class="form-group col-md-6">
                        <label for="rh">RH:</label>
                        <input type="text" class="form-control" name="rh" disabled>
                    </div>       
                    <div class="form-group col-md-6">
                        <label for="nombre">Nombre:</label>
                        <input type="text" class="form-control" name="rh" disabled>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="eps">EPS:</label>
                        <input type="text" class="form-control" name="eps" disabled>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="apellido">Apellido:</label>
                        <input type="text" class="form-control" name="apellido" disabled>
                    </div>
                    <div class="form-group col-6">
                        <label for="cedula">C.C:</label>
                        <input type="text" class="form-control" name="cedula" disabled>
                    </div>
                        <div class="col-md-6">
                            <label for="contacto">Contacto de confianza:</label>
                            <input type="text" class="form-control" name="contacto" disabled>
                        </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-12 text-end">
                        <a type="button" href="{{ route('visitas.create') }}" class="btn btn-success">Registrar visita</a>
                    </div>
                </div>
                <br>
                <br>
                <br>
            </div>
        </div>
    </form>
</div>

@endsection