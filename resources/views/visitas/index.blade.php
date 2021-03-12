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
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title"></h5>
                </div>
                <div class="container">
                    <div class="row">
                      <div class="col">
                        <form action="" method="POST">
                            <div class="card-header text-center">AGREGAR NUEVO VISITANTE</div>
                                <div class="card-body">
                                    
                                    <div class="row form-group">
                                        <label for="" class="col-2">Empresa</label>
                                        <input type="text" name="empresa" class="form-control col-md-9" required>
                                    </div>
                                    
                                    <div class="row form-group">
                                        <label for="" class="col-2">Nombre</label>
                                        <input type="text" name="nombre" class="form-control col-md-9" required>
                                    </div>
            
                                    <div class="row form-group">
                                        <label for="" class="col-2">Apellido</label>
                                        <input type="text" name="apellido" class="form-control col-md-9" required>
                                    </div>
            
                                    <div class="row form-group">
                                        <label for="">Telefono de emergencia</label>
                                        <input type="text" name="contacto" class="form-control col-md-9" required>
                                    </div>
            
                                    <div class="row form-group">
                                        <label for="" class="col-2">RH</label>
                                        <select name="rh" required value="{{old('rh')}}" class="form-control">
                                            <option disabled selected>Seleccione...</option>
                                            <option>A+</option>
                                            <option>A-</option>
                                            <option>B+</option>
                                            <option>B-</option>
                                            <option>O+</option>
                                            <option>O-</option>
                                            <option>AB+</option>
                                            <option>AB-</option>							
                                        </select>
                                    </div>
            
                                    <div class="row form-group">
                                        <label for="" class="col-2">EPS</label>
                                        <select name="eps" required value="{{old('eps')}}" class="form-control">
                                            <option value="">Seleccione...</option>
                                            <option value="Colisalud">Colisalud</option>
                                            <option value="Caprecom">Caprecom</option>
                                            <option value="Cafesalud">Cafesalud</option>
                                            <option value="Capresoca">Capresoca</option>
                                            <option value="Colmedica">Colmedica</option>
                                            <option value="Compensar">Compensar</option>
                                            <option value="Cafenacolantioquia">Cafenacol antioquia</option>
                                            <option value="Cafenacolvalle">Cafenacol valle</option>
                                            <option value="Convidaars">Convida ARS</option>
                                            <option value="Coomevaeps">Coomeva eps</option>
                                            <option value="Cruzblanca ">Cruz blanca </option>
                                            <option value="Famisanar">Famisanar</option>
                                            <option value="Humanavivir ">Humana vivir </option>
                                            <option value="Institutodelossegurossociales ">Instituto de los seguros sociales </option>
                                            <option value="Saludcolmena">Salud colmena</option>
                                            <option value="Saludcolpatria">Salud colpatria</option>
                                            <option value="Saludtotal">Salud total </option>
                                            <option value="Saludcolombia eps">Salud colombia eps </option>
                                            <option value="Comevaepss.a">Coomeva eps S.A</option>
                                            <option value="Saludcoop ">Saludcoop</option>
                                            <option value="Saludvida">Salud vida</option>
                                            <option value="Sanitas ">Sanitas</option>
                                            <option value="Salvasalud">Salvasalud</option>
                                            <option value="Solsalud">Solsalud</option>
                                            <option value="S.o.seps">S.o.s eps</option>
                                            <option value="Susalud">Susalud</option>
                                            <option value="Sura">Sura</option>
                                            <option value="Capiltalsalud">Capital salud</option>
                                            <option value="Confacundi">Confacundi</option>
                                            <option value="Savia_Salud">Savia Salud</option>
                                            <option value="Comparta">Comparta</option>
                                            <option value="AMBUQ">AMBUQ</option>
                                            <option value="CAJACOPI">CAJACOPI</option>
                                            <option value="COMFACOR">COMFACOR</option>
                                            <option value="EMDISALUD">EMDISALUD</option>
                                            <option value="COMFASUCRE">COMFASUCRE</option>
                                            <option value="COOSALUD">COOSALUD</option>
                                            <option value="MUTUAL_SER">MUTUAL SER</option>
                                            <option value="NUEVA_EPS_SUBSIDIADA">NUEVA EPS SUBSIDIADA</option>
                                            <option value="SALUDVIDA">SALUDVIDA</option>
                                            <option value="NUEVA_EPS_CONTRIBUTIVO">NUEVA EPS CONTRIBUTIVO</option>
                                            <option value="BONSALUD_En_Liquidación">BONSALUD En Liquidación</option>
                                            <option value="Unimec">Unimec</option>
                                            <option value="Colseguros">Colseguros</option>
                                            <option value="Comfenalco">Comfenalco</option>
                                            <option value="EPS_Servicio_Occidental_de_Salud EPS Servicio Occidental de Salud"> EPS
                                                Servicio Occidental de Salud</option>
                                            <option value="EPS_Risaralda_Ltda_En_Liquidacion">EPS Risaralda Ltda. En Liquidación
                                            </option>
                                            <option value="Corporanonimas_en_Liquidacion">Corporanonimas en Liquidación</option>
                                            <option value="CAJANAL">CAJANAL</option>
                                            <option value="BARRANQUILLA_SANA">BARRANQUILLA SANA</option>
                                            <option value="CALISALUD">CALISALUD</option>
                                            <option value="E.P.S._de_CALDAS_S.A.">E.P.S. de CALDAS S.A.</option>
                                            <option value="E.P.S._CONDOR_S.A.">E.P.S. CONDOR S.A.</option>
                                            <option value="OTRA" id="OTRA">otra</option>
                                        </select>
                                </div>
            
                                <div class="row form-group">
                                    <label for="">Tipo de Visitante</label>
                                    <select name="t_visita" required value="{{old('t_visita')}}" class="form-control">
                                        <option value="">Seleccione...</option>
                                        <option value="Contratista">Contratista</option>
                                        <option value="Proveedor">Proveedor</option>
                                        <option value="Cliente">Cliente</option>
                                        <option value="OTRO">Otro</option>
                                    </select>
                                </div>
            
                                <div class="row form-group">
                                    <label for="" class="col-2">C.C</label>
                                    <input type="text" name="documento" class="form-control col-md-9" required> 
                                </div>
            
                                <br>
            
                                <div class="modal-footer">
                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                        <button type="submit" id="btn_save" class="btn btn-primary">Guardar</button>
                                        <a href="" class="btn btn-danger">Cancelar</a>
                                    </div>
                                </div>
            
        
        
                            </div>
                        </form>
                      </div>
                        <div class="col">
                            <img src="imagenes/logo.png" alt="" width="200px" height="200px">
                            <div class="custom-control custom-checkbox mt-3">
                                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                <label class="form-check-label" for="flexCheckDefault">
                                    Recibe información y firma de politicas de confidencialidad
                                </label>
                            </div>
                            
                            
                            <div class="custom-control custom-checkbox mt-3">
                                <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked">
                                <label class="form-check-label" for="flexCheckChecked">
                                    Recibe y firma información de politica de protección y tratamiento de datos personales
                                </label>
                            </div>
                            
                            
                            <div class="custom-control custom-checkbox mt-3">
                                <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked">
                                <label class="form-check-label" for="flexCheckChecked">
                                    Recibe y firma de seguridad y salud en el trabajo
                                </label>
                            </div>
                        </div>
                    </div>
                    
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