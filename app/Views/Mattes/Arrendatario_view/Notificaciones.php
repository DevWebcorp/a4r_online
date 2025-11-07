<script src="<?= base_url() ?>/../../assets/lib/jquery/jquery.js"></script>
<script src="<?= base_url() ?>/../../assets/lib/jquery-ui/jquery-ui.js"></script>

<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/toastify-js"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
<link href="<?= base_url() ?>/../../assets/lib/SpinKit/spinkit.css" rel="stylesheet">

<section class="segundo-registro mg-b-120 mg-t-70">
    <div class="container mt-5">
        <div class="row mt-5">
            <div class="col-12 text-center mt-5">
                <h1 class="registrate"><?= $title ?></h1>
            </div>
            <div class="col-12">
                <h2 class="text-center mt-3">Sé parte de Mattes</h2>

                <!-- <div class="progress mt-3 mb-5">
                    <div class="progress-bar progress-bar-striped bg-sucess progress-bar-animated" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%"></div>
                </div> -->

                <!-- <div class="row justify-content-center pb-5">
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
                            <li class="stepper__item_active">
                            <p class="stepper__link stepper__link--active">
                                <span class="stepper__icon">
                                    <span class="badge">2</span>  
                                </span>
                                <span class="stepper_text">Documentación</span>
                            </p>
                            </li>                            
                            <li class="stepper__item_active">
                            <p class="stepper__link stepper__link--active">
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
                    <button class="tablinks visited mb-1 mr-lg-1"><i class="fa fa-address-card-o mr-2" aria-hidden="true"></i>General</button>
                    <button class="tablinks visited mb-1 mr-lg-1"><i class="fa fa-file-text-o mr-2" aria-hidden="true"></i>Documentación</button>
                    <button class="tablinks active mb-1 mr-lg-1"><i class="fa fa-bell-o mr-2" aria-hidden="true"></i>Notificaciones</button>                    
                </div>

                <div class="col-12 form-border mb-200 mb-sm-0">
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
                                <div class="col-md-8 mx-auto">
                                    <div class="text-center text-sm-right my-5">
                                        <button class="btn btn-primary px-4 py-1"  type="submit"><i class="fa fa-floppy-o fa-lg mr-1" aria-hidden="true"></i>Guardar</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>