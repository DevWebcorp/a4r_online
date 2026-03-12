<?= $this->extend('layout/main') ?>

<!--LIBRERIAS DINAMICAS PARA CSS-->
<?= $this->section('css') ?>
<!-- Aquí puedes agregar hojas de estilo específicas para esta vista -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@tarekraafat/autocomplete.js@10.2.7/dist/css/autoComplete.01.min.css">
    <link href="<?= base_url() ?>/assets/lib/SpinKit/spinkit.css" rel="stylesheet">
    <link href="<?= base_url() ?>/assets/css/estilos.css" rel="stylesheet">
<?= $this->endSection() ?>

<!-- CONTENIDO DINAMICO -->
<?= $this->section('content') ?>

<style>
    @media(min-width:992px) {
    .table-responsive {
        display: inline-table;
        overflow-x: hidden !important;
    }
}
</style>

<!-- <div id="loader" class="modal fade show" style="display: none; padding-left: 0px; z-index: 99999999;">
    <div class="modal-dialog modal-dialog-vertical-center" role="document">
        <div class="d-flex ht-300 pos-relative align-items-center">
            <div class="sk-chasing-dots">
                <div class="sk-child sk-dot1 bg-red-800"></div>
                <div class="sk-child sk-dot2 bg-green-800"></div>
            </div>
        </div>
    </div>
</div> -->

<section class="inicio mb-lg-5 mg-t-80">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 mt-5 height-inicio">
                <div class="tab backoffice mb-lg-4">
                    <button class="tablinks ml-md-4 mr-md-2" onclick="openCity(event, 'Propiedades')" id="defaultOpen">Propiedades</button>
                    <button class="tablinks mr-md-2" onclick="openCity(event, 'Propietarios')" id="arrendadores">Propietarios</button>
                    <button class="tablinks mr-md-2" onclick="openCity(event, 'Alumnos')" id="arrendatarios">Alumnos</button>
                </div>

                <div id="Propiedades" class="tabcontent">
                    <table id="propiedades-bo" class="table display table-responsive mt-3 tablas_mattes" style="width: 100%;">
                        <thead class="sorting_asc sorting_desc">
                            <tr>
                                <th class="wd-15p">Propiedad</th>
                                <th class="wd-15p">Fecha</th>
                                <th class="wd-15p">Estatus</th>
                                <th class="wd-15p">Prioridad</th>
                            </tr>
                        </thead>
                        <tbody>

                        </tbody>
                    </table>
                </div>

                <div id="Propietarios" class="tabcontent">
                    <div class="col-md-3 pl-0 mb-5">
                        <button class="btn-teal px-4 py-2 mg-b-100 mb-md-0" type="submit" id="subir_propietario" style="font-size: 1rem;">
                            <i class="fa fa-plus mr-1" aria-hidden="true"></i>SUBIR PROPIETARIO
                        </button>
                    </div>
                    <table id="propretarios-bo" class="table display table-responsive mt-3 tablas_mattes " style="width: 100%;">
                        <thead>
                            <tr>
                                <th class="text-center" scope="col">Nombre</th>
                                <th class="text-center" scope="col">Correo</th>
                                <th class="text-center" scope="col">Fecha </th>
                                <th class="text-center" scope="col">Estatus</th>
                                <th class="text-center" scope="col">Prioridad</th>
                                <th class="text-center" scope="col">Verificar correo</th>
                                <th class="text-center" scope="col">Cambiar contraseña</th>
                                <th class="text-center" scope="col">Agregar propiedad</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>

                <div id="Alumnos" class="tabcontent">
                    <table id="alumnos" class="table display table-responsive mt-3 tablas_mattes" style="width: 100%;">
                        <thead class="sorting_asc sorting_desc">
                            <tr>
                                <th class="text-center" scope="col">Nombre</th>
                                <th class="text-center" scope="col">Correo</th>
                                <th class="text-center" scope="col">Fecha</th>
                                <th class="text-center" scope="col">Estatus</th>
                                <th class="text-center" scope="col">Prioridad</th>
                                <th class="text-center" scope="col">Verificar correo</th>
                                <th class="text-center" scope="col">Cambiar contraseña</th>
                            </tr>
                        </thead>
                    </table>
                </div>

            </div>

        </div>
    </div>
    </div>
</section>

<!-- ACTUALIZAR CONTRASEÑA -->
<div id="updateContra" class="modal fade">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content bd-0 tx-14">
            <div class="modal-header bg-warning pd-x-20">
                <h6 class="tx-14 mg-b-0 tx-uppercase text-white tx-bold">ACTUALIZAR CONTRASEÑA</h6>
                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Cerrar">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="POST" id="formUpdateContra">
                <div class="row justify-content-center pd-40 mt-4">
                    <h6 style="text-align:center;">Ingresar nueva contraseña</h6>
                    <br>            
                    <input id="contra" type="text" class="form__input col-10 mt-2" required name="contra" aria-describedby="passwordHelpBlock" style="background-color: white !important; color: rgba(0,0,0,.8) !important; border: 1px solid black !important;">
                    <input type="hidden" name="id_user" id="id_user">
                </div>
                <div class="modal-footer justify-content-center">
                    <button id="delete-btn" type="submit" class="btn btn-warning btnbtn-delete pd-x-20"><i class="fa fa-pencil mr-1"
                            aria-hidden="true"></i>ACTUALIZAR</button>
                    <button type="button" class="btn btn-secondary pd-x-20" data-dismiss="modal"><i
                            class="fa fa-times mr-1" aria-hidden="true"></i>Cancelar</button>
                </div>
            </form>
        </div>
    </div>
</div>

<?= $this->endSection() ?>

<?= $this->section('scripts') ?>    
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/toastify-js"></script>
    <script src="https://momentjs.com/downloads/moment-with-locales.min.js"></script>

<?= $this->endSection() ?>
