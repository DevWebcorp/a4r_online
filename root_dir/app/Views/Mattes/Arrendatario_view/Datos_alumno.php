<script src="<?= base_url() ?>/../../assets/lib/jquery/jquery.js"></script>
<script src="<?= base_url() ?>/../../assets/lib/jquery-ui/jquery-ui.js"></script>

<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/toastify-js"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
<link href="<?= base_url() ?>/../../assets/lib/SpinKit/spinkit.css" rel="stylesheet">

<script src="https://cdnjs.cloudflare.com/ajax/libs/tarekraafat-autocomplete.js/10.2.7/autoComplete.min.js"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@tarekraafat/autocomplete.js@10.2.7/dist/css/autoComplete.01.min.css">


<!--prefijo -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/css/intlTelInput.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/intlTelInput.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/utils.js"></script>


<style>
    .iti--allow-dropdown {
        width: 100% !important;

    }
</style>







<div id="loader" class="modal fade show" style="display: none; padding-left: 0px;">
    <div class="modal-dialog modal-dialog-vertical-center" role="document">
        <div class="d-flex ht-300 pos-relative align-items-center">
            <div class="sk-chasing-dots">
                <div class="sk-child sk-dot1 bg-red-800"></div>
                <div class="sk-child sk-dot2 bg-green-800"></div>
            </div>
        </div>
    </div>
</div>


<div class=" mg-t-120">
    <div class="container mg-t-100">
        <div class="tab datos-alumno d-flex flex-column flex-md-row  justify-content-center">
            <button class="tablinks mr-sm-2" onclick="openCity(event, 'Personales-alumno')" id="defaultOpen"><i class="fa fa-user-o mr-2" aria-hidden="true"></i>Datos
                personales</button>
            <button class="tablinks  mr-sm-2" onclick="openCity(event, 'Documentos')" id="documentos"><i class="fa fa-file-o mr-2" aria-hidden="true"></i>Cuéntanos de ti</button>
            <button class="tablinks mr-sm-2" onclick="openCity(event, 'Notificaciones')" id="notificaciones"><i class="fa fa-envelope-o mr-2" aria-hidden="true"></i>Notificaciones</button>
        </div>

        <!--=========================================
                ===== DATOS PERSONALES =====
        =============================================-->
        <div id="Personales-alumno" class="tabcontent">
            <div class="container">
                <h3 class="text-center position-relative  datos-personales-alumno my-4">Datos personales</h3>
                <div class="row form-border">
                    <div class="col-12">
                        <form class="" id="form-personales-alumno" enctype="multipart/form-data">
                            <div class="row justify-content-center mg-t-20 px-3">
                                <div class="col-lg-7 px-0">
                                    <div class="col-sm-12 text-center">
                                        <div class="col-sm-12">
                                            <img style="width: 140px; height: 140px;" class="img-fluid rounded-circle" id="img" src="<?= base_url() ?>/../../assets/img/default.png" />
                                        </div>
                                    </div>
                                    <div class="col-sm-12 mg-t-10 mg-sm-t-0">
                                        <div class="file-drop-area">
                                            <span class="choose-file-button">Subir Archivo</span>
                                            <span class="file-message">Arrastra el archivo aqui</span>
                                            <input id="file-user" class="file-input" type="file" name="file" accept=".jpg, .png, .jpeg">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row mg-t-40 px-3">
                                <div class="col-lg-7 form__group">
                                    <input id="nombre" type="text" class="form__input" placeholder=" " required name="nombre" pattern="[a-zA-ZñÑáéíóúÁÉÍÓÚ\s]+" minlength="3" maxlength="25" aria-describedby="passwordHelpBlock" title="Solo se permiten letras">
                                    <label class="form__label">Nombre<span class="tx-danger">*</span></label>
                                    <div class="requirements">
                                        Tiene que tener mínimo 3 caracteres
                                    </div>
                                </div>
                            </div>

                            <input type="hidden" id="prefix">
                            <div class="row mg-t-40 px-3">
                                <div class="col-lg-7 form__group">
                                    <input id="primer_apellido" type="text" class="form__input" placeholder=" " required name="primer_apellido" pattern="[a-zA-ZñÑáéíóúÁÉÍÓÚ\s]+" minlength="3" maxlength="25" aria-describedby="passwordHelpBlock" title="Solo se permiten letras">
                                    <label class="form__label">Primer apellido<span class="tx-danger">*</span></label>
                                    <div class="requirements">
                                        Tiene que tener mínimo 3 caracteres
                                    </div>
                                </div>
                            </div>
                            <div class="row mg-t-40 px-3">
                                <div class="col-lg-7 form__group">
                                    <input id="segundo_apellido" type="text" class="form__input" placeholder=" " required name="segundo_apellido" pattern="[a-zA-ZñÑáéíóúÁÉÍÓÚ\s]+" minlength="3" maxlength="25" aria-describedby="passwordHelpBlock" title="Solo se permiten letras">
                                    <label class="form__label">Segundo apellido<span class="tx-danger">*</span></label>
                                    <div class="requirements">
                                        Tiene que tener mínimo 3 caracteres
                                    </div>
                                </div>
                            </div>

                            <label class="form__label" for="celular">Número de celular<span class="tx-danger">*</span></label>
                            <div class="row mg-t-40 px-3">
                                <div class="col-lg-7 form__group">
                                    <input type="tel" class="form__input" id="phone" autocomplete="off" required>
                                    <div class="requirements">
                                        Tiene que tener 10 dígitos
                                    </div>
                                </div>
                            </div>





                            <!-- <div class="row mg-t-40 px-3">
                                <div class="col-lg-7 form__group">
                                    <input id="celular" type="text" class="form__input" placeholder=" " required name="celular" pattern="^[0-9]+" minlength="10" maxlength="10" aria-describedby="passwordHelpBlock" title="Solo se permiten numeros">
                                    <label class="form__label">Número celular<span class="tx-danger">*</span></label>
                                    <div class="requirements">
                                        Debe de ser un número de 10 dígitos.
                                    </div>
                                </div>
                            </div> -->
                            <div class="row mg-t-40 px-3">
                                <div class="col-lg-7 form__group">
                                    <input id="f_nacimiento" type="date" class="form__input" placeholder="Ingresar fecha de nacimiento" required name="f_nacimiento" pattern="^[0-9]+" minlength="10" maxlength="10" aria-describedby="passwordHelpBlock" title="Solo se permiten numeros">
                                    <label class="form__label">Fecha de nacimiento<span class="tx-danger">*</span></label>
                                    <div class="requirements">
                                        No coincide el formato
                                    </div>
                                </div>
                            </div>
                            <div class="row mg-t-40 px-3">
                                <div class="col-lg-7 form__group">
                                    <select id="sexo" name="sexo" class="form__input select2" data-placeholder="Selecciona una opción" required>
                                        <option value="">Selecciona una opción</option>
                                    </select>
                                    <label class="form__label">Sexo<span class="tx-danger">*</span></label>
                                </div>
                            </div>

                            <div class="row mg-t-40 px-3">
                                <div class="col-lg-7 form__group">
                                    <textarea id="describete" class="form__input" name="describete" placeholder=" " pattern="[a-zA-ZñÑáéíóúÁÉÍÓÚ\s]+" minlength="10" maxlength="140" aria-describedby="passwordHelpBlock" title="Solo se permiten letras"></textarea>
                                    <label class="form__label">Describete<span class="tx-danger">*</span></label>
                                    <div class="requirements">
                                        Tiene que tener mínimo 10 caracteres
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-7 mx-auto">
                                <div class="text-right mt-3 mg-b-50">
                                    <button class="btn btn-teal px-4 py-1" type="submit"><i class="fa fa-pencil fa-lg mr-1" aria-hidden="true"></i>Actualizar</button>
                                </div>
                            </div>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!--=========================================
            ===== DOCUMENTOS    =====
        =============================================-->
    <div id="Documentos" class="tabcontent">
        <div class="container ">
            <h3 class="text-center position-relative  documentos-alumno my-4">Cuéntanos de ti</h3>
            <div class="row">
                <div class="col-12 form-border height-cuentanos">
                    <div class="pd-20 pt-lg-0 pd-sm-40 form-layout form-layout-4 mg-t-10" style="border: none;">
                        <form class="" id="form_documentos" enctype="multipart/form-data">
                            <div class="row mg-t-30 px-3">
                                <div class="col-lg-7 form__group">
                                    <input id="autoComplete" type="text" class="form__input" placeholder=" " required name="universidad" autocomplete="off" style="background-color: white !important; color: rgba(0,0,0,.8) !important; border: 1px solid #28a745 !important;">
                                    <ul id="searchResult"></ul>
                                    <div class="clear"></div>
                                    <input id="id_univ" class="form__input" type="hidden" name="id_univ"></input>
                                    <label class="form__label">Universidad más cercana<span class="tx-danger">*</span></label>
                                    <div class="requirements">
                                        Escribe una universidad
                                    </div>
                                </div>
                            </div>

                            <div class="row mg-t-20 px-3">
                                <div class="col-lg-7 form__group">
                                    <input id="carrera" type="text" class="form__input" placeholder=" " name="carrera" autocomplete="off" pattern="[a-zA-ZñÑáéíóúÁÉÍÓÚ\s]+" minlength="3" maxlength="100" aria-describedby="passwordHelpBlock" title="Solo se permiten letras">
                                    <label class="form__label">Carrera</label>
                                    <div class="requirements">
                                        Tiene que tener mínimo 3 caracteres
                                    </div>
                                </div>
                            </div>

                            <div class="row mg-t-40 px-3">
                                <div class="col-lg-7 form__group">
                                    <select id="estado" name="estado" class="form__input select2" required data-placeholder="Selecciona una opción">
                                        <option value="">Selecciona una opción</option>
                                    </select>
                                    <label class="form__label">¿De qué estado vienes?<span class="tx-danger">*</span></label>
                                </div>
                            </div>

                            <!-- <div class="row justify-content-center mg-t-20 px-3">
                                    <div class="col-lg-7 px-0">
                                        <label class="col-sm-12 form-control-label">Carta de admisión o credencial universidad (vigente)<span class="tx-danger">*</span></label>
                                        <div class="col-sm-12 mg-t-10 mg-sm-t-0">
                                            <div class="file-drop-area">
                                                <span class="choose-file-button">Subir Archivo</span>
                                                <span class="file-message">Arrastra el archivo aqui</span>
                                                <input id="file-universidad" class="file-input" type="file" name="file_carta" accept=".pdf, .jpg, .png, .jpeg">
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row justify-content-center mg-t-20 px-3">
                                    <div class="col-lg-7 px-0">
                                        <label class="col-sm-12 form-control-label">Identificación oficial (pasaporte o INE)<span class="tx-danger">*</span></label>
                                        <div class="col-sm-12 mg-t-10 mg-sm-t-0">
                                            <div class="file-drop-area">
                                                <span class="choose-file-button">Subir Archivo</span>
                                                <span class="file-message">Arrastra el archivo aqui</span>
                                                <input id="file-identificacion" class="file-input" type="file" name="file_INE" accept=".pdf, .jpg, .png, .jpeg">
                                            </div>
                                        </div>
                                    </div>
                                </div> -->

                            <div class="col-sm-12 mt-4">
                                <div class="form-group mt-3 text-center">
                                    <!-- <div class="custom-control custom-checkbox mb-3 text-primary">
                                            <input type="checkbox" class="custom-control-input" id="customControlValidation1" required>
                                            <label class="custom-control-label" for="customControlValidation1">Términos y condiciones</label>
                                            <div class="invalid-feedback">Selecciona</div>
                                        </div> -->
                                </div><!-- form-group -->
                            </div>

                            <div class="col-lg-7 mx-auto">
                                <div class="text-right">
                                    <button class="btn btn-teal px-4 py-1" type="submit"><i class="fa fa-pencil fa-lg mr-1" aria-hidden="true"></i>Actualizar</button>
                                </div>
                            </div>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


<!--=========================================
            ===== NOTIFICACIONES =====
        =============================================-->
<div id="Notificaciones" class="tabcontent">
    <div class="container ">
        <h3 class="text-center position-relative notificaciones-alumno my-4">Notificaciones</h3>
        <div class="row">
            <div class="col-12 form-border mb-sm-0">
                <div class="pd-20 pd-sm-40 pt-md-0 form-layout form-layout-4 mg-t-10" style="border: none;">
                    <form id="form_notificaciones" enctype="multipart/form-data">
                        <div class="mg-t-20">
                            <div class="row mg-t-30 px-3">
                                <p class="col-sm-7 text-center text-sm-left">Notificaciones en correo</p>
                                <div class="col-sm-5 mg-t-10 mg-sm-t-0 text-center">
                                    <label class="switch">
                                        <input type="checkbox" checked id="notis-correo" name="notis_correo">
                                        <span class="slider round"></span>
                                    </label>
                                </div>
                            </div>

                            <h5 class="text-center notificacione mg-t-30">¿Qué notificaciones quieres que lleguen a tu correo?
                            </h5>

                            <div class="row mg-t-30 px-3">
                                <p class="col-sm-7 text-center text-sm-left">Nuevas citas</p>
                                <div class="col-sm-5 mg-t-10 mg-sm-t-0 text-center">
                                    <label class="switch">
                                        <input id="nueva-cita" name="nuevas_citas" type="checkbox" checked>
                                        <span class="slider round"></span>
                                    </label>
                                </div>
                            </div>
                            <div class="row mg-t-30 px-3">
                                <p class="col-sm-7 text-center text-sm-left">Avisos</p>
                                <div class="col-sm-5 mg-t-10 mg-sm-t-0 text-center">
                                    <label class="switch">
                                        <input id="avisos" name="avisos" type="checkbox" checked>
                                        <span class="slider round"></span>
                                    </label>
                                </div>
                            </div>
                            <div class="row mg-t-30 px-3">
                                <p class="col-sm-7 text-center text-sm-left">Mensajes</p>
                                <div class="col-sm-5 mg-t-10 mg-sm-t-0 text-center">
                                    <label class="switch">
                                        <input id="mensajes" name="mensajes" type="checkbox" checked>
                                        <span class="slider round"></span>
                                    </label>
                                </div>
                            </div>
                            <div class="row mg-t-30 px-3">
                                <p class="col-sm-7 text-center text-sm-left">Promociones</p>
                                <div class="col-sm-5 mg-t-10 mg-sm-t-0 text-center">
                                    <label class="switch">
                                        <input id="promos" name="promos" type="checkbox" checked>
                                        <span class="slider round"></span>
                                    </label>
                                </div>
                            </div>
                            <input id="id_usuarionot" name="id_usuarionot" type="hidden">

                            <div class="col-md-8 mx-auto">
                                <div class="text-center text-sm-right my-5">
                                    <button class="btn btn-teal px-4 py-1" type="submit"><i class="fa fa-pencil fa-lg mr-1" aria-hidden="true"></i>Actualizar</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

</div> <!-- div container fin -->
</div>

<script>
    let id_usuario = <?php echo json_encode($id_usuario); ?>;
</script>