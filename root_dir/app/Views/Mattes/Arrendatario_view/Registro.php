<script src="<?= base_url() ?>/assets/lib/jquery/jquery.js"></script>
<script src="<?= base_url() ?>/assets/lib/jquery-ui/jquery-ui.js"></script>

<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/toastify-js"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
<link href="<?= base_url() ?>/assets/lib/SpinKit/spinkit.css" rel="stylesheet">

<!--prefijo -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/css/intlTelInput.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/intlTelInput.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/utils.js"></script>


<style>
    .iti--allow-dropdown{
        width: 100% !important;

    }
</style>




<div class="alert bg-warning mg-t-100 d-none" id="succes-alert" role="alert">
    <button type="button" class="close" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
    <div class="d-flex align-items-center justify-content-start">
        <i class="fa fa-exclamation-triangle alert-icon tx-32 mg-t-5 mg-xs-t-0"></i>
        <span><strong>SU CORREO ELECTRÓNICO NO HA SIDO VERIFICADO, POR FAVOR VERIFIQUE SU BANDEJA DE ENTRADA</strong> <span id="success"></span></span>
    </div><!-- d-flex -->
</div><!-- alert -->

<section class="registro mg-b-120 mg-t-70">
    <div class="container mt-5">
        <div class="row mt-5">
            <div class="col-12 text-center mt-5">
                <h1 class="registrate"><?= $title ?></h1>
            </div>
            <div class="col-12 ">
                <h2 class="text-center my-3">Sé parte de Mattes</h2>

                <!-- <div class="progress mt-3 mb-5">
                    <div class="progress-bar progress-bar-striped bg-sucess progress-bar-animated" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width: 50%"></div>
                </div> -->

                <!-- <div class="row justify-content-center mb-4">
                    <nav class="stepper__wrapper">
                        <ul class="stepper">
                            <li class="stepper__item_active">
                            <p class="stepper__link  stepper__link--active">
                                <span class="stepper__icon">
                                    <span class="badge">1</span>
                                </span>
                                <span class="stepper_text">General</span>
                            </p>
                            </li>
                            <li class="stepper__item">
                            <p class="stepper__link">
                                <span class="stepper__icon">
                                    <span class="badge">2</span>  
                                </span>
                                <span class="stepper_text">Documentación</span>
                            </p>
                            </li>                            
                            <li class="stepper__item">
                            <p class="stepper__link ">
                                <span class="stepper__icon">
                                    <span class="badge">3</span>
                                </span>
                                <span class="stepper_text">Notificaciones</span>
                            </p>
                            </li>
                        </ul>
                    </nav> 
                </div> -->
                <div class="tab generales d-flex flex-column flex-lg-row justify-content-center">
                    <button class="tablinks active mb-1 mr-lg-1"><i class="fa fa-address-card-o mr-2" aria-hidden="true"></i>General</button>
                    <button class="tablinks faltante mb-1 mr-lg-1"><i class="fa fa-file-text-o mr-2" aria-hidden="true"></i>Documentación</button>
                    <button class="tablinks faltante mb-1 mr-lg-1"><i class="fa fa-bell-o mr-2" aria-hidden="true"></i>Notificaciones</button>
                </div>

                <form class="mg-b-90 mb-lg-4" id="registro" enctype="multipart/form-data">
                    <div class="row justify-content-center mg-t-20 px-3">
                        <div class="col-12 text-center">
                            <div class="col-12">
                                <img class="img-fluid rounded-circle" style="width: 140px; height: 140px;" id="img" src="<?= base_url() ?>/assets/img/default.png" />
                            </div>
                        </div>
                        <div class="col-lg-7 mg-t-10 mg-sm-t-0">
                            <div class="file-drop-area">
                                <span class="choose-file-button">Subir foto de perfil</span>
                                <span class="file-message">Arrastra el archivo aqui</span>
                                <input id="file-user" class="file-input" type="file" name="file" accept=".jpg, .png, .jpeg">
                            </div>
                        </div>
                    </div>
                    <div class="row mg-t-40 px-3">
                        <div class="col-lg-7 form__group">
                            <input type="text" class="form__input" id="nombre" name="nombre_e" pattern="[a-zA-ZñÑáéíóúÁÉÍÓÚ\s]+" minlength="3" maxlength="25" autocomplete="off" placeholder=" " required>
                            <label class="form__label" for="nombre">Nombre<span class="tx-danger">*</span></label>
                            <div class="requirements">
                                Tiene que tener mínimo 3 caracteres
                            </div>
                        </div>
                    </div>
                    <div class="row mg-t-40 px-3">
                        <div class="col-lg-7 form__group">
                            <input type="text" class="form__input" id="p_apellido" name="prim_apellido" pattern="[a-zA-ZñÑáéíóúÁÉÍÓÚ\s]+" minlength="3" maxlength="25" autocomplete="off" placeholder=" " required>
                            <label class="form__label" for="p_apellido">Primer apellido<span class="tx-danger">*</span></label>
                            <div class="requirements">
                                Tiene que tener mínimo 3 caracteres
                            </div>
                        </div>
                    </div>
                    <div class="row mg-t-40 px-3">
                        <div class="col-lg-7 form__group">
                            <input type="text" class="form__input" id="s_apellido" name="seg_apellido" pattern="[a-zA-ZñÑáéíóúÁÉÍÓÚ\s]+" minlength="3" maxlength="25" autocomplete="off" placeholder=" " required>
                            <label class="form__label" for="s_apellido">Segundo apellido<span class="tx-danger">*</span></label>
                            <div class="requirements">
                                Tiene que tener mínimo 3 caracteres
                            </div>
                        </div>
                    </div>


                    <!-- <label class="form__label" for="celular">Número de celular<span class="tx-danger">*</span></label> -->
                    <div class="row mg-t-40 px-3">
                        <div class="col-lg-7 form__group">
                            <input type="tel" class="form__input" id="phone" autocomplete="off" required>
                            <div class="requirements">
                                Tiene que tener 10 dígitos
                            </div>
                        </div>
                    </div>
                    
                    <div class="row mg-t-40 px-3">
                        <div class="col-lg-7 form__group">
                            <input type="date" class="form__input" id="f_nac" name="nacimiento" required>
                            <label class="form__label" for="f_nac">Fecha de nacimiento<span class="tx-danger">*</span></label>
                        </div>
                    </div>
                    <div class="row mg-t-40 px-3">
                        <div class="col-lg-7 form__group">
                            <select id="sexo" name="sexo" class="form__input select2" data-placeholder="Selecciona una opción" required>
                                <option value="">Selecciona una opción</option>
                            </select>
                            <label class="form__label" for="sexo">Sexo<span class="tx-danger">*</span></label>
                        </div>
                    </div>
                    <div class="row mg-t-40 px-3">
                        <div class="col-lg-7 form__group">
                            <input type="text" class="form__input" id="descripcion" name="describete" placeholder=" ">
                            <label class="form__label" for="descripcion">Describete</label>
                        </div>
                    </div>
                    <div class="col-lg-7 mx-auto">
                        <div class="text-right mt-3">
                            <button type="submit" class="btn-teal px-4 py-1" id="siguiente" name="registro-uno">
                                <span style="font-size:18px; cursor: pointer;">Siguiente</a><i class="fa fa-arrow-circle-right fa-lg ml-1" aria-hidden="true"></i>
                                </span>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>