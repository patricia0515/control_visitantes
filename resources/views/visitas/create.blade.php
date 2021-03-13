@extends('layouts.plantilla')

@section('namePage', 'Registrar visita')

@section('content')
    <div class="container">
        <form action="" method="POST">
            @csrf
            <div class="row">
                <div class="col-md-12">
                    <h3 class="text-center mt-5">Registrar Visitas</h3><br>
                    <div class="row">
                        <div class="form-group col-6">
                            <label for="rp">Registro pertenecias:</label>
                            <select class="form-control" id="area" name="reg_pert" required>
                                <option disabled>Seleccione</option>
                            </select>
                        </div>
                        
                        <div class="form-group col-md-6">
                            <label for="sede">Sede:</label>
                            <select class="form-control" id="area" name="sede" required>
                                <option disabled>Seleccione</option>
                            </select>
                        </div>       
                        <div class="form-group col-md-6">
                            <label for="descripcion">Descripción:</label><br>
                            <input type="text" class="form-control" name="descripcion" require>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="rol">Tipo de visitante:</label>
                            <select class="form-control" id="departamento" name="departamento">
                                <option disabled>Seleccione</option>
                            </select>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="rol">Serial:</label>
                            <select class="form-control" id="ciudad" name="ciudad">
                                <option disabled>Seleccione</option>
                            </select>
                        </div>
                        <div class="form-group col-6">
                            <label for="">Visita a:</label>
                            <input type="text" class="form-control" name="cedula" require>
                        </div>
                            <div class="col-md-6">
                                <label for="rol">Motivo:</label>
                                <select class="form-control" id="sexo" name="motivo">
                                    <option disabled>Seleccione</option>
                                    <option  value="1">Masculino</option>
                                    <option value="2">Femenino</option>
                                    <option value="2">Femenino</option>
                                </select>
                            </div>
                        <div class="form-group col-6">
                            <label for="">Responsable de la visita:</label>
                            <input type="text" class="form-control" name="resp_vis" require>
                        </div>
                        <div class="form-group col-6">
                            <label for="">Registrar vehiculo:</label>
                            <input type="text" class="form-control" name="reg_veh" require>
                        </div>
                        <div class="form-group col-6">
                            <label for="">¿Tiene vehiculo?:</label>
                            <input type="text" class="form-control" name="t_veh" require>
                        </div>
                        <div class="form-group col-6">
                            <label for="">Fecha de nacimiento:</label>
                            <input type="date" class="form-control" name="fechanacimiento" require>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 text-end"><br>
                            <button type="submit" class="btn btn-success me-2">Registrar visita</button>
                            <a type="button" href="{{ route('visitantes.index') }}" class="btn btn-success">Atras</a>
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