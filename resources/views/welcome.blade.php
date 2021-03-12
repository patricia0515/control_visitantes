@extends('layouts.plantilla')

@section('content')
  
    
    <div class="card-search">
        <h3 class="card-title">
            Ingresar n&uacute;mero de c&eacute;dula:
        </h3>
        <div class="card-option">
                <input type="text" name="" id="">
                <button type="submit" id='btnSearch'><i class="fas fa-search"></i></button>
        <button type="submit" id='btnViewUser'><i class="far fa-eye"></i></button>
    </div>
  
@endsection


@section('modal')
    <!-- Modal create -->
    <div class="modal fade" id="modalCreate" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalCreateTitle"></h5>
                </div>
                <form name="departmentForm" id="departments" action="" method="POST">
                    <div class="modal-body">
                        <input type="hidden" name="department_id" id="department_id">
                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <label for="name">Nombre *</label>
                                    <input type="text" name="name" id="name" class="form-control" placeholder="Nombre" required>

                                    <label for="name">Nombre *</label>
                                    <input type="text" name="name" id="name" class="form-control" placeholder="Nombre" required>
                                    
                                    <label for="name">Nombre *</label>
                                    <input type="text" name="name" id="name" class="form-control" placeholder="Nombre" required>

                                    <label for="name">Nombre *</label>
                                    <input type="text" name="name" id="name" class="form-control" placeholder="Nombre" required>

                                    <label for="name">Nombre *</label>
                                    <input type="text" name="name" id="name" class="form-control" placeholder="Nombre" required>

                                    <label for="name">Nombre *</label>
                                    <input type="text" name="name" id="name" class="form-control" placeholder="Nombre" required>

                                    <label for="name">Nombre *</label>
                                    <input type="text" name="name" id="name" class="form-control" placeholder="Nombre" required>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <button type="submit" id="btn_save" class="btn btn-primary">Guardar</button>
                            <a href="" class="btn btn-danger">Cancelar</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Show user modal -->
    <div class="modal fade" id="modalShowUser" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalTitleShowUser"></h5>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-xs-10 col-sm-10 col-md-10 " id="table"> 
                            <ul>
                                <li>test</li>
                                <li>test</li>
                                <li>test</li>
                                <li>test</li>
                                <li>test</li>
                                <li>test</li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <a href="" class="btn btn-light">Aceptar</a>
                        <button class="btn btn-dark" id="btnRegisterVisit"><i class="far fa-edit pe-1"></i></i>Registrar</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- modal create visit -->
    <div class="modal fade" id="modalRegisterVisit" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalRegisterVisitTitle"></h5>
                </div>
                <form name="departmentForm" id="departments" action="" method="POST">
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12">

                                <div class="form-group mt-2">
                                    <label for="gender">Registro de pertenencias: *</label>
                                    <select name="gender" class="form-control" id="btnGender">
                                        <option selected="true" disabled="disabled">Seleccione una pertenencia</option>
                                        <option value="">Ninguno</option>
                                        <option value="">Equipos-computo</option>
                                        <option value="">Equipos-herramientas</option>
                                        <option value="">Art&iacute;culos-personales</option>
                                    </select>
                                </div>

                                <div class="form-group mt-2">
                                    <label for="body">Descripci&oacute;n *</label>
                                    <textarea name="body" id="body" rows="3" class="form-control"></textarea>
                                </div>
                                
                                <div class="form-group mt-2">
                                    <label for="name">Serial: *</label>
                                    <input type="text" name="name" id="name" class="form-control" placeholder="Nombre">
                                </div>

                                <div class="form-group mt-2">
                                    <label for="gender">Motivo: *</label>
                                    <select name="gender" class="form-control" id="btnGender">
                                        <option selected="true" disabled="disabled">Seleccione un motivo</option>
                                        <option value="">Trabajo</option>
                                        <option value="">Visitas</option>
                                        <option value="">Capacitacion</option>
                                        <option value="">Reuni&oacute;n</option>
                                        <option value="">Otros</option>
                                    </select>
                                </div>

                                <div class="form-group mt-2">
                                    <label for="gender">Sede: *</label>
                                    <select name="gender" class="form-control" id="btnGender">
                                        <option selected="true" disabled="disabled">Seleccione una sede</option>
                                        <option value="">Itagui</option>
                                        <option value="">Site - 1</option>
                                        <option value="">Site - 2</option>
                                        <option value="">Site - 3</option>
                                        <option value="">Site - 4</option>
                                        <option value="">Site - 5</option>
                                        <option value="">Site - 6</option>
                                        <option value="">Site - 7</option>
                                        <option value="">Recursos Humanos</option>
                                        <option value="">Calle 80</option>
                                        <option value="">Carrera 30</option>
                                    </select>
                                </div>

                                <div class="form-group mt-2">
                                    <label for="gender">Tipo de visitante: *</label>
                                    <select name="gender" class="form-control" id="btnGender">
                                        <option selected="true" disabled="disabled">Seleccione un visitante</option>
                                        <option value="">Contratista</option>
                                        <option value="">Proveedor</option>
                                        <option value="">Cliente</option>
                                        <option value="">Otro</option>
                                    </select>
                                </div>

                                <div class="form-group mt-2">
                                    <label for="name">Visita a: *</label>
                                    <input type="text" name="name" id="name" class="form-control" placeholder="Nombre">
                                </div>

                                <div class="form-group mt-2">
                                    <label for="body">Registrar veh&iacute;culo: *</label>
                                    <textarea name="body" id="body" rows="3" class="form-control"></textarea>
                                </div>

                                <div class="form-group mt-2">
                                    <label for="gender">Veh&iacute;culo? *</label>
                                    <select name="gender" class="form-control" id="btnGender">
                                        <option selected="true" disabled="disabled">Seleccione ...</option>
                                        <option value="">Si</option>
                                        <option value="">No</option>
                                    </select>
                                </div>
                                
                                <div class="input-group mt-3">
                                    <input type="file" class="form-control" id="inputGroupFile04" aria-describedby="inputGroupFileAddon04" aria-label="Upload">
                                  </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <button type="submit" id="btn_save" class="btn btn-primary">Guardar</button>
                            <a href="" class="btn btn-danger">Cancelar</a>
                        </div>
                    </div>
                </form>
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