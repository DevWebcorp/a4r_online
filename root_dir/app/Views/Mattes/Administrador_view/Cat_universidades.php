<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/toastify-js"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">
<script src="https://momentjs.com/downloads/moment-with-locales.min.js"></script>

<link href="<?= base_url() ?>../../../assets/lib/SpinKit/spinkit.css" rel="stylesheet">

<div id="loader" class="modal fade show" style="display: none; padding-left: 0px; z-index: 999999999;">
    <div class="modal-dialog modal-dialog-vertical-center" role="document">
        <div class="d-flex ht-300 pos-relative align-items-center">
            <div class="sk-chasing-dots">
                <div class="sk-child sk-dot1 bg-red-800"></div>
                <div class="sk-child sk-dot2 bg-green-800"></div>
            </div>
        </div>
    </div>
</div>

<section class="mg-t-120 mg-b-120">
    <div class="container">
        <div class="pd-20 pd-sm-40">
            <div class="sl-page-title">
                <h5 class="text-uppercase"><?=$title?></h5>
                <p><?=$description?></p>
            </div>
            <div>
                <button id="agregar-universidad" class="btn btn-teal pd-x-20" data-toggle="modal" data-target="#modal_agregar"><i class="fa fa-plus" aria-hidden="true"></i> Agregar nuevo</button>
                <br><br>
            </div>

            <div class="tab-content">
                <table id="table-university" class="display table table-responsive " style="width: 100%;">
                    <thead>
                        <tr>
                            <th scope="col">UNIVERSIDAD</th>
                            <th scope="col">ESTADO</th>
                            <th scope="col">LATITUD</th>
                            <th scope="col">LONGITUD</th>
                            <th scope="col">ACCIONES</th>
                        </tr>
                    </thead>
                    <tbody></tbody>
                </table>
            </div><!-- table-wrapper -->
        </div><!-- card -->
    </div>
</section>

<!-- ########## START: MAIN PANEL ########## -->
<div class="sl-mainpanel">
    <div class="sl-pagebody">
        <!-- sl-page-title -->
        
    </div>
</div>

<div id="modal_agregar" class="modal fade">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content bd-0 tx-14">
            <div class="modal-header bg-teal pd-y-20 pd-x-25">
                <h6 class="tx-14 mg-b-0 tx-uppercase text-white tx-bold">Agregar universidad</h6>
                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-lg">
                <form id="form-insert" method="POST" enctype="multipart/form-data" >
                    <div class="pd-25">
                        <div class="card pd-20 pd-sm-20 form-layout form-layout-4 mg-t-0">
                            <p class="mg-b-20 mg-sm-b-30">Inserte por favor los siguientes campos.</p>
                            <div class="row">
                                <div class="col-sm-12 mg-t-10 mg-sm-t-0">
                                    <label>Universidad</label>
                                    <input type="text" name="n_universidad" id="n_universidad" class="form-control" required>
                                </div>

                                <div class="col-sm-12 mg-t-10 mg-sm-t-10">
                                    <label>Estado</label>
                                    <select class="form-control estado" name="estado" id="estado" data-placeholder="Selecciona una opción">
                                        <option value="">Selecciona una opción</option>
                                    </select>
                                </div>

                                <div class="col-sm-6 mg-t-10 mg-sm-t-10">
                                    <label>Latitud</label>
                                    <input type="text" name="latitud" id="latitud" class="form-control" required>
                                </div>

                                <div class="col-sm-6 mg-t-10 mg-sm-t-10">
                                    <label>Longitud</label>
                                    <input type="text" name="longitud" id="longitud" class="form-control" required>
                                </div>
                            </div>

                            <div class="modal-footer justify-content-center mg-t-40">
                                <button id="insert_uni" type="submit" class="btn btn-teal pd-x-20"><i class="fa fa-check-circle-o mr-1" aria-hidden="true"></i> Agregar</button>
                                <button type="button" class="btn btn-secondary pd-x-20" data-dismiss="modal"><i class="fa fa-times-circle mr-1" aria-hidden="true"></i> Cancelar</button>
                            </div>
                        </div>
                    </div>
                   
                </form>
            </div>

            
        </div>
    </div><!-- modal-dialog -->
</div><!-- modal -->

<div id="modal_update" class="modal fade">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content bd-0 tx-14">
            <div class="modal-header reasignar pd-y-20 pd-x-25">
                <h6 class="tx-14 mg-b-0 tx-uppercase text-white tx-bold">Agregar universidad</h6>
                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-lg">
                <form id="form-update" method="POST" enctype="multipart/form-data" >
                    <div class="pd-25">
                        <div class="card pd-20 pd-sm-20 form-layout form-layout-4 mg-t-0">
                            <p class="mg-b-20 mg-sm-b-30">Inserte por favor los siguientes campos.</p>
                            <div class="row">
                                <div class="col-sm-12 mg-t-10 mg-sm-t-0">
                                    <label>Universidad</label>
                                    <input type="text" name="n_update" id="n_update" class="form-control" required>
                                </div>

                                <div class="col-sm-12 mg-t-10 mg-sm-t-10">
                                    <label>Estado</label>
                                    <select class="form-control estado" name="estado_update" id="estado_update" data-placeholder="Selecciona una opción">
                                        <option value="">Selecciona una opción</option>
                                    </select>
                                </div>

                                <div class="col-sm-6 mg-t-10 mg-sm-t-10">
                                    <label>Latitud</label>
                                    <input type="text" name="latitud_update" id="latitud_update" class="form-control" required>
                                    <input type="hidden" name="id_update" id="id_update" class="form-control">
                                </div>

                                <div class="col-sm-6 mg-t-10 mg-sm-t-10">
                                    <label>Longitud</label>
                                    <input type="text" name="longitud_update" id="longitud_update" class="form-control" required>
                                </div>

                            </div>

                            <div class="modal-footer justify-content-center mg-t-40">
                                <button id="update_uni" type="submit" class="btn reasignar pd-x-20"><i class="fa fa-check-circle-o mr-1" aria-hidden="true"></i> Actualizar</button>
                                <button type="button" class="btn btn-secondary pd-x-20" data-dismiss="modal"><i class="fa fa-times-circle mr-1" aria-hidden="true"></i> Cancelar</button>
                            </div>
                        </div>
                    </div>
                   
                </form>
            </div>

            
        </div>
    </div><!-- modal-dialog -->
</div><!-- modal -->

<!--Modal delete-->
<div id="modal_delete" class="modal fade">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content bd-0 tx-14">
            <div class="modal-header bg-danger pd-y-20 pd-x-25">
                <h6 class="tx-14 mg-b-0 tx-uppercase text-white tx-bold">Eliminar universidad</h6>
                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-lg">
                <form id="form-delete" method="POST" enctype="multipart/form-data">
                    <div class="pd-80 pd-sm-80 form-layout form-layout-4">
                        <h6 style="text-align:center;">¿Deseas continuar con esta acción?</h6>
                        <br>
                        <p style="color:red; text-align:center;">No se podrán deshacer los cambios una vez realizada la acción</p>
                        <input type="hidden" name="id_uni" id="id_uni">
                    </div><!-- card -->
                

                    <div class="modal-footer">
                        <button id="delete_uni" type="submit" class="btn btn-danger pd-x-20"><i class="fa fa-check-circle-o mr-1" aria-hidden="true"></i>Aceptar</button>
                        <button type="button" class="btn btn-secondary pd-x-20" data-dismiss="modal"><i class="fa fa-times-circle mr-1" aria-hidden="true"></i>Cancelar</button>
                    </div>
                </form>
            </div>
        </div>
    </div><!-- modal-dialog -->
</div><!-- modal -->


