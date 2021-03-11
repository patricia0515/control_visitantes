@extends('layouts.plantilla')
<h1>Esta es la vista Crear Visitante</h1>

<div class="containermt-5">
    <div class="row justify-content-center">
        <div class="col md-7 mt-5">
            
            <div class="card">
                <form action="" method="POST">
                    <div class="card-header text-center">AGREGAR NUEVO VISITANTE</div>
                    <div class="card-body">
                        
                        <div class="row form-group">
                            <label for="" class="col-2">Empresa</label>
                            <input type="text" name="empresa" class="form-control col-md-9">
                        </div>
                        
                        <div class="row form-group">
                            <label for="" class="col-2">Nombre</label>
                            <input type="text" name="nombre" class="form-control col-md-9">
                        </div>

                        <div class="row form-group">
                            <label for="" class="col-2">Apellido</label>
                            <input type="text" name="apellido" class="form-control col-md-9">
                        </div>

                        <div class="row form-group">
                            <label for="" class="col-4">Telefono de emergencia</label>
                            <input type="text" name="contacto" class="form-control col-md-9">
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
                        <label for="" class="col-2">Tipo de Visitante</label>
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
                        <input type="text" name="documento" class="form-control col-md-9">
                    </div>

                    <br>

                    <div class="row form-group">
                        <button type="submit" class="btn btn-success col-md-9 offset-2">Guardar</button>
                    </div>



                    </div>
                </form>
            </div>

        </div>
    </div>

</div>