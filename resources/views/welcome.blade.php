@extends('layouts.plantilla')

@section('content')
    {{-- ESTE EL EL SEARCH --}}
    <div class="card-search">
        <h3 class="card-title">
            Ingresar n&uacute;mero de c&eacute;dula:
        </h3>
        <div class="card-option">
            <input type="text" id="SearchText">
            <a id='btnSearch' class="btn-card-option"><i class="fas fa-search"></i></a>
            <a id='btnViewUser' class="btn-card-option hideClass"><i class="far fa-eye"></i></a>    
        </div>
        <br>
        {{-- Si me esta retornando un mensaje desde el controlador, me lo imprime por pantalla --}}
        @if ($message = Session::get('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <p>{{ $message }}.</p>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        @if (count($errors)>0)
		  <div class="alert alert-danger">
			  <ul>
			  @foreach ($errors->all() as $error)	
				  <li> {{$error}} </li>
			  @endforeach	
			  </ul>			
		  </div>
		@endif
    </div>
@endsection


@section('modal')

    <!-- Modal create -->
    <div class="modal fade" data-bs-backdrop="static" data-bs-keyboard="false" tapindex="-1" id="modalCreate" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalCreateTitle"></h5>
                </div>
                    <div class="modal-body">
                        <div class="container">
                            <div class="row">
                                <div class="col">
                                    <form action="{{ route('visitantes.store')}}" method="POST">
                                        @csrf
                                        <div class="card-body">
    
                                            <div class="row form-group mt-2">
                                                <label for="empresa" class="col-2">Empresa:</label>
                                                <input type="text" name="empresa" class="form-control col-md-9" required>
                                            </div>
    
                                            <div class="row form-group mt-2">
                                                <label for="nombre" class="col-2">Nombre:</label>
                                                <input type="text" name="nombre" class="form-control col-md-9" required>
                                            </div>
    
                                            <div class="row form-group mt-2">
                                                <label for="apellido" class="col-2">Apellido:</label>
                                                <input type="text" name="apellido" class="form-control col-md-9" required>
                                            </div>
    
                                            <div class="row form-group mt-2">
                                                <label for="contacto">Tel&eacute;fono de emergencia:</label>
                                                <input type="number" name="contacto" class="form-control col-md-9" required>
                                            </div>
    
                                            <div class="row form-group mt-2">
                                                <label for="" class="col-2">RH:</label>
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
    
                                            <div class="row form-group mt-2">
                                                <label for="eps" class="col-2">EPS:</label>
                                                <select name="eps" required value="{{old('eps')}}" class="form-control">
                                                    <option value="" disabled selected>Seleccione...</option>
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
                                                    <option value="Institutodelossegurossociales ">Instituto de los seguros
                                                        sociales </option>
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
                                                    <option
                                                        value="EPS_Servicio_Occidental_de_Salud EPS Servicio Occidental de Salud">
                                                        EPS
                                                        Servicio Occidental de Salud</option>
                                                    <option value="EPS_Risaralda_Ltda_En_Liquidacion">EPS Risaralda Ltda. En
                                                        Liquidación
                                                    </option>
                                                    <option value="Corporanonimas_en_Liquidacion">Corporanonimas en
                                                        Liquidación</option>
                                                    <option value="CAJANAL">CAJANAL</option>
                                                    <option value="BARRANQUILLA_SANA">BARRANQUILLA SANA</option>
                                                    <option value="CALISALUD">CALISALUD</option>
                                                    <option value="E.P.S._de_CALDAS_S.A.">E.P.S. de CALDAS S.A.</option>
                                                    <option value="E.P.S._CONDOR_S.A.">E.P.S. CONDOR S.A.</option>
                                                    <option value="OTRA" id="OTRA">otra</option>
                                                </select>
                                            </div>
    
                                            <div class="row form-group mt-2">
                                                <label for="t_visita">Tipo de visitante:</label>
                                                <select name="t_visita" required value="{{old('t_visita')}}"
                                                    class="form-control">
                                                    <option value="" disabled selected>Seleccione...</option>
                                                    <option value="Contratista">Contratista</option>
                                                    <option value="Proveedor">Proveedor</option>
                                                    <option value="Cliente">Cliente</option>
                                                    <option value="OTRO">Otro</option>
                                                </select>
                                            </div>
                                            <div class="modal-footer">
                                                <div class="col-xs-12 col-sm-12 col-md-12">
                                                    <button type="submit" 
                                                        class="btn btn-primary">Guardar</button>
                                                    <a href="" class="btn btn-danger">Cancelar</a>
                                                </div>
                                            </div>
                                            
                                            <br>
                                            
                                        </div>
                                    
                                </div>
                                <div class="col">
                                    <div class="text-center">
                                        <img src="imagenes/logo.png" alt="" width="200px" height="200px">
                                    </div>
                                    <div class="row form-group mt-2">
                                        <label for="documento" class="col-2">CC:</label>
                                        <input type="text" id="searchText2" name="documento" class="form-control col-md-9" readonly>
                                    </div>
                                    <div class="custom-control custom-checkbox mt-3">
                                        <input class="form-check-input" name="politica_confidencialidad" type="checkbox" value="Estoy de acuerdo" id="flexCheckDefault" required>
                                        <label class="form-check-label" for="flexCheckDefault">
                                            Recibe informaci&oacute;n y firma de politicas de confidencialidad
                                        </label>
                                    </div>
    
                                    <div class="custom-control custom-checkbox mt-3">
                                        <input class="form-check-input" name="proteccion_datos" type="checkbox" value="Estoy de acuerdo" id="flexCheckChecked" required>
                                        <label class="form-check-label" for="flexCheckChecked">
                                            Recibe y firma informaci&oacute;n de politica de protecci&oacute;n y tratamiento de datos 
                                            personales
                                        </label>
                                    </div>
    
                                    <div class="custom-control custom-checkbox mt-3">
                                        <input class="form-check-input" name="seguridad_salud_trabajo" type="checkbox" value="Estoy de acuerdo" id="flexCheckChecked" required>
                                        <label class="form-check-label" for="flexCheckChecked">
                                            Recibe y firma de seguridad y salud en el trabajo
                                        </label>
                                    </div>
                                    <br>
                                    
                                </div>
                            </div>
                        </div>
                    </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Show user modal -->
    <div class="modal fade" id="modalShowUser" data-bs-backdrop="static" data-bs-keyboard="false" tapindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog modal-dialog-scrollable modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalTitleShowUser"></h5>
                </div>
                <div class="modal-body">
                    <div class="row"> 
                        <div class="col-xs-12 col-sm-12 col-md-12" id="inputs">

                        </div>
                    </div>

                    {{-- FINAL DE FORMULARIO QUE ME MUESTRA LOS DATOS DEL USUARIO QUE YA EXISTE EN LA BASE DE DATOS --}}
                </div>
                <div class="modal-footer">
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <a href="{{ route('index')}}" class="btn btn-light">Aceptar</a>
                        <a class="btn btn-dark" id="btnRegisterVisit"><i lass="far fa-edit pe-1"></i></i>Registrar Visita</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

    <!-- modal create visit -->
    <div class="modal fade" id="modalRegisterVisit" data-bs-backdrop="static" data-bs-keyboard="false" tapindex="-1" id="modalCreate" aria-hidden="true"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalRegisterVisitTitle"></h5>
                </div>
                <form name="departmentForm" id="departments" action="{{ route('visitas.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group mt-2">
                                    <label for="gender">Registro de pertenencias: *</label>
                                    <select name="reg_pertenencias" class="form-control" id="btnGender">
                                        <option selected="true" disabled="disabled">Seleccione una pertenencia</option>
                                        <option value="Ninguno">Ninguno</option>
                                        <option value="Equipos-computo">Equipos-computo</option>
                                        <option value="Equipos-herramientas">Equipos-herramientas</option>
                                        <option value="Art&iacute;culos-personales">Art&iacute;culos-personales</option>
                                    </select>
                                </div>

                                <div class="form-group mt-2">
                                    <label for="body">Descripci&oacute;n *</label>
                                    <textarea name="descripcion" id="body" rows="3" class="form-control" required></textarea>
                                </div>

                                <div class="form-group mt-2">
                                    <label for="name">Serial: *</label>
                                    <input type="text" name="serial" id="name" class="form-control" placeholder="Nombre">
                                </div>

                                <div class="form-group mt-2">
                                    <label for="gender">Motivo: *</label>
                                    <select name="motivo" class="form-control" id="btnGender">
                                        <option selected="true" disabled="disabled">Seleccione un motivo</option>
                                        <option value="Trabajo">Trabajo</option>
                                        <option value="Visitas">Visitas</option>
                                        <option value="Capacitacion">Capacitacion</option>
                                        <option value="Reuni&oacute;n">Reuni&oacute;n</option>
                                        <option value="Otros">Otros</option>
                                    </select>
                                </div>

                                <div class="form-group mt-2">
                                    <label for="gender">Sede: *</label>
                                    <select name="sede" class="form-control" id="btnGender">
                                        <option selected="true" disabled="disabled">Seleccione una sede</option>
                                        <option value="Itagui">Itagui</option>
                                        <option value="Site - 1">Site - 1</option>
                                        <option value="Site - 2">Site - 2</option>
                                        <option value="Site - 3">Site - 3</option>
                                        <option value="Site - 4">Site - 4</option>
                                        <option value="Site - 5">Site - 5</option>
                                        <option value="Site - 6">Site - 6</option>
                                        <option value="Site - 7">Site - 7</option>
                                        <option value="Recursos Humanos">Recursos Humanos</option>
                                        <option value="Calle 80">Calle 80</option>
                                        <option value="Carrera 30">Carrera 30</option>
                                    </select>
                                </div>

                                <div class="form-group mt-2">
                                    <label for="gender">Tipo de visitante: *</label>
                                    <select name="tip_visitante" class="form-control" id="btnGender">
                                        <option selected="true" disabled="disabled">Seleccione un visitante</option>
                                        <option value="Contratista">Contratista</option>
                                        <option value="Proveedor">Proveedor</option>
                                        <option value="Cliente">Cliente</option>
                                        <option value="Otro">Otro</option>
                                    </select>
                                </div>

                                <div class="form-group mt-2">
                                    <label for="name">Visita a: *</label>
                                    <input type="text" name="visita" id="name" class="form-control" placeholder="Nombre" required>
                                </div>

                                <div class="form-group mt-2">
                                    <label for="name">Responsable de la visita: *</label>
                                    <input type="text" name="resp_visita" id="name" class="form-control" placeholder="Responsable de la visita" required>
                                </div>

                                <div class="form-group mt-2">
                                    <label for="body">Registrar veh&iacute;culo: *</label>
                                    <textarea name="reg_vehiculo" id="body" rows="3" class="form-control" required></textarea>
                                </div>

                                <div class="form-group mt-2">
                                    <label for="gender">¿Veh&iacute;culo? *</label>
                                    <select name="vehiculo" class="form-control" id="inputimagen">
                                        <option selected="true" disabled="disabled">Seleccione ...</option>
                                        <option value="Si">Si</option>
                                        <option value="No">No</option>
                                    </select>
                                </div>

                                <div class="input-group mt-3">
                                    <input type="file" class="form-control hideClass" id="imputimg" name="files"
                                        aria-describedby="inputGroupFileAddon04" aria-label="Upload" accept="image/*">
                                </div><br>
                                <!-- error al cargar un archivo que no sea imagen -->
                                @error('files')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror

                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <button type="submit"  class="btn btn-primary">Guardar</button>
                            <a href="{{ route('index')}}" class="btn btn-danger">Cancelar</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection


@section('script')

    <!-- Boostrap-->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.6.0/dist/umd/popper.min.js"
        integrity="sha384-KsvD1yqQ1/1+IA7gi3P0tyJcT3vR+NdBTt13hSJ2lnve8agRGXTTyNaBYmCR/Nwi"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.min.js"
        integrity="sha384-nsg8ua9HAw1y0W1btsyWgBklPnCUAFLuTMS2G72MMONqmOymq585AcH49TLBQObG"
        crossorigin="anonymous"></script>
    <!-- SweetAlert -->
    <script src="{{ asset('assets/sweetAlert2/sweetalert2.all.min.js')}}"></script>
    <!-- Scripts -->
    <script src="{{ asset('js/script.js') }}"></script>

@endsection