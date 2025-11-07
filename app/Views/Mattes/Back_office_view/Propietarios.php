<script src="https://momentjs.com/downloads/moment-with-locales.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/toastify-js"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">

<section class="propiedades-tabla mb-200 mg-t-90" style="height=auto;">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h3 class="propiedades mt-3">Propietarios</h4>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="col-md-3 pl-0 mb-5">
                    <button class="btn-teal px-4 py-2 mg-b-100 mb-md-0" type="submit" id="subir_propietario" style="font-size: 1rem;">
                        <i class="fa fa-plus mr-1" aria-hidden="true"></i>SUBIR PROPIETARIO
                    </button>
                </div>
                <table id="propietarios" class="table display table-responsive mt-3" style="width: 100%;">
                    <thead class="sorting_asc sorting_desc">
                        <tr>
                            <th>Nombre</th>
                            <th>Correo</th>
                            <th>Tipo</th>
                            <th>No. de propiedades</th>
                            <th>Estatus</th>
                            <th>Alta</th>
                            <th>Acceso</th>
                            <th>Acción</th>
                            <!-- <th>Contraseña</th> -->
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>

<!-- cambio de contraseña -->

<div id="myModal" class="modal fade">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content tx-size-sm">
            <div class="modal-header bg-success pd-x-20">
                <h6 class="tx-14 mg-b-0 tx-uppercase text-white tx-bold">Cambiar contraseña</h6>
                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="formCreate" enctype="multipart/form-data">
                <div class="pd-20 text-center">
                    <div class="card pd-20 pd-sm-40">
                        <h6 class="card-body-title">Cambio de contraseña</h6>
                        <p class="mg-b-20 mg-sm-b-30">Rellena todos los campos</p>
                        <div class="form-layout">
                            <div class="row mg-b-25">
                                <div class="row mg-t-20 formulario__grupo" id="grupo__password">
                                    <label class="col-12 form-control-label">Nueva Contraseña<span class="tx-danger">*</span></label>
                                    <div class="col-sm-12 mg-t-10 mg-sm-t-0 input-group" id="show_hide_password">
                                        <input placeholder=" " type="password" class="form-control" name="password" id="password1" required>
                                        <!-- <i class="formulario__validacion-estado fas fa-times-circle"></i> -->
                                        <div class="input-group-addon" style="border-radius: 10px;">
                                            <a href=""><i class="fa fa-eye-slash" aria-hidden="true"></i></a>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mg-t-20 formulario__grupo" id="grupo__password">
                                    <label class="col-12 form-control-label">Repetir Contraseña<span class="tx-danger">*</span></label>
                                    <div class="col-sm-12 mg-t-10 mg-sm-t-0 input-group" id="show_hide_password2">
                                        <input placeholder=" " type="password" class="form-control" name="password2" id="password2" required>
                                        <!-- <i class="formulario__validacion-estado fas fa-times-circle"></i> -->
                                        <div class="input-group-addon" style="border-radius: 10px;">
                                            <a href=""><i class="fa fa-eye-slash" aria-hidden="true"></i></a>
                                        </div>
                                    </div>
                                </div>
                                <input id="iuser" type="hidden" name="user">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success pd-x-20">Agregar</button>
                    <button type="button" class="btn btn btn-danger pd-x-20" data-dismiss="modal">Cancelar</button>
                </div>
            </form>
        </div>
    </div><!-- modal-dialog -->
</div>
