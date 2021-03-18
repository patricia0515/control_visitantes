@extends('layouts.plantilla')

@section('content')
<br>
<div class="col-md-7 mb-4">
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div>
                    <h1>CARRUSEL</h1>
                </div>
            </div>
        </div>
    </div>
</div>
<br>
<div class="col-md-7 mb-4">
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div>
                    <h1>Hola Grafica</h1>
                </div>
            </div>
        </div>
    </div>
</div>
<br>
<div class="col-md-5 mb-4">
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div>
                    <h1>Hola Boton</h1>
                    <P>
                        Clic <a href=" {{ route('visitas.excel') }} ">aqui</a>
                        Para descargar en EXCEL las visitas
                    </P>
                </div>
            </div>
        </div>
    </div>
</div>
<br>
@endsection