@extends('layouts.plantilla')
@section('content')
    <div class="hero">
        <!-- header -->
        <div class="header">
            <div class="title-header">
                <div class="title-icon">
                    <i class="fas fa-bars"></i>
                </div>
                <h2>Sistema control de visitas</h2>
            </div>
        </div>

        <!-- menu -->
        <div class="menu">
            <div class="menu-header">
                <i class="far fa-eye"></i>
                <h3>Sistema de visitas</h3>
            </div>
            <div class="menu-option">
                <div class="menu-option-title">
                    <h4>navegaci&oacute;n</h4>
                </div>
                <ul class="menu-list">
                    <li><a href="#"><i class="cont-icons fas fa-home"></i>inicio</a></li>
                    <li><a href="#"><i class="cont-icons fas fa-book-open"></i>visitantes</a></li>
                    <li><a href="#"><i class="cont-icons fas fa-book"></i>registro</a></li>
                </ul>
            </div>
        </div> 

        <!-- content -->   
        <div class="content">
            <!-- <img src="SharedScreenshot.jpg" alt=""> -->
            <div class="card-hero">
                <div class="card-content">
                    <h3 class="card-title">
                        Ingresar n&uacute;mero de c&eacute;dula:
                    </h3>
                    <div class="card-option">
                        <input type="text" name="" id="">
                        <button type="submit" id='btnSearch'><i class="fas fa-search"></i></button>
                        <button type="submit" id='btnViewUser'><i class="far fa-eye"></i></button>
                    </div>
                </div>
            </div>
        </div>
    </div>

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
    <div class="modal fade" id="modalRegisterVisit" aria-hidden="true">
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