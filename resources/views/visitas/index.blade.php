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
    <div class="modal fade" id="modalRegisterVisit" aria-hidden="true" style="display: block">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalRegisterVisitTitle"></h5>
                </div>
                <form name="departmentForm" id="departments" action="" method="POST">
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <label for="name">Nombre *</label>
                                    <input type="text" name="name" id="name" class="form-control" placeholder="Nombre">
                                </div>
                                <div class="form-group">
                                    <label for="file">C&eacute;dula *</label>
                                    <input type="text" name="number_id" id="number_id" class="form-control" placeholder="C&eacute;dula">
                                </div>
                                <div class="form-group">
                                    <label for="fecha">Fecha de nacimiento *</label>
                                    <input type="date" name="dateOfbirth" id="dateOfbirth" class="form-control">
                                    <label for="fecha">Edad </label>
                                    <input type="text" class="form-control" id="TestEdad">
                                </div>
                                <div class="form-group">
                                    <label for="gender">G&eacute;nero *</label>
                                    <select name="gender" class="form-control" id="btnGender">
                                        <option selected="true" disabled="disabled">Seleccione un g&eacute;nero</option>
                                        <option value="Femenino">Femenino</option>
                                        <option value="Masculino">Masculino</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="country">Pa&iacute;s *</label>
                                    <select name="country_id" class="form-control" id="btnCountry">
                                        <option selected="true" disabled="disabled">Seleccione un pa&iacute;s</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="state">Departamento *</label>
                                    <select name="state_id" class="form-control" id="btnState">
                                        <option selected="true" disabled="disabled">Seleccione un departamento</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="city">Ciudad *</label>
                                    <select name="city_id" class="form-control" id="btnCity">
                                        <option selected="true" disabled="disabled">Seleccione una ciudad</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <div id="alertEmail" class="alert alert-danger">&nbsp;</div>
                                    <label for="email">Email *</label>
                                    <input type="email" class="form-control" name="email" id="btnEmail">
                                </div>
                                <div class="form-group">
                                    <label for="department">&Aacute;rea *</label>
                                    <select name="department_id" class="form-control" id="btnDepartment">
                                        <option selected="true" disabled="disabled">Seleccione una &aacute;rea</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <div id="alertPass" class="alert alert-danger">&nbsp;</div>
                                    <label for="iframe">Contrase&ntilde;a</label>
                                    <input type="password" class="form-control" name="password" id="password">
                                </div>
                                
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <button type="submit" class="btn btn-primary">Guardar</button>
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