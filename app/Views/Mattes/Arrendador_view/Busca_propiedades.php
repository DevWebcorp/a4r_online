<div class="alert bg-warning mg-t-100 d-none" id="alert_correo" role="alert">
    <button type="button" class="close" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
    <div class="d-flex align-items-center justify-content-start">
        <i class="fa fa-exclamation-triangle alert-icon tx-32 mg-t-5 mg-xs-t-0"></i>
        <span><strong>SU CORREO ELECTRÓNICO NO HA SIDO VERIFICADO, POR FAVOR VERIFIQUE SU BANDEJA DE ENTRADA</strong> <span id="success"></span></span>
    </div><!-- d-flex -->
</div><!-- alert -->

<section class="container my-5 casas mg-b-120">    
    <div class="row">
        <div class="col-12 col-lg-10 mx-auto mb-3">
            <div class="d-flex justify-content-center justify-content-lg-between">
                <a href="<?= base_url() ?>/Mattes/Arrendador/Detalle_propiedad"><i class="ionicons ion-images display-3 mr-5"></i></a>
                <a href="<?= base_url() ?>/Mattes/Arrendador/Beneficios_invitacion"><i class="fa fa-users fa-4x" aria-hidden="true"></i></a>
            </div>         
        </div>
        <div class="col-12 col-lg-8 m-auto">
            <form class="collapse d-flex align-items-center mr-xl-3" id="formulario-buscar">
                <div class="input-group p-3 p-xl-0">
                    <div class="input-group-append">
                        <button class="boton-buscar py-0 px-4 pl-xl-3 pr-xl-0" type="button">
                            <i class="ionicons ion-ios-search-strong h2 mb-0" style="margin-top: 0.2rem;"></i>
                        </button>
                    </div>
                    <input type="text" name="campo-buscar" class="form-control campo-buscar" placeholder="Buscar">
                </div>
            </form>
        </div>
        
        <div class="col-12">
            <h2 class="text-center mt-3">Casas y depas en renta</h2>
        </div>
        <div class="col-md-6 col-lg-4">
            <div class="card">
                <figure>
                    <img class="img-fluid" src="<?= base_url() ?>/../../assets/img/anuncio1.jpg" alt="Casa en renta">
                    <i class="ionicons ion-checkmark-circled h2 mr-5 sello-mattes"></i>
                    <i class="ionicons ion-android-checkbox-outline h2 verifica-propiedad"></i>
                    <i class="ionicons ion-ios-bolt h1 posiciona-propiedad"></i>
                    <a href="<?= base_url() ?>/Mattes/Arrendador/Detalle_propiedad"><i class="ionicons ion-edit h2 detalle-propiedad text-warning"></i></a>
                </figure>
            </div>
            <div class="card-body bg-white">
                <h3>Casa 1</h3>
                <p>Estatus: disponible</p>
            </div>
        </div>
        <div class="col-md-6 col-lg-4">
            <div class="card">
                <figure>
                    <img class="img-fluid" src="<?= base_url() ?>/../../assets/img/anuncio2.jpg" alt="Casa en renta">
                    <a href="<?= base_url() ?>/Mattes/Arrendador/Detalle_propiedad"><i class="ionicons ion-edit h2 detalle-propiedad text-warning"></i></a>
                </figure>       
            </div>
            <div class="card-body bg-white">
                <h3>Casa 2</h3>
                <p>Estatus: disponible</p>
            </div>
        </div>
        <div class="col-md-6 col-lg-4">
            <div class="card">
                <figure>
                    <img class="img-fluid" src="<?= base_url() ?>/../../assets/img/anuncio3.jpg" alt="Casa en renta">
                    <i class="ionicons ion-android-checkbox-outline h2 verifica-propiedad"></i>
                    <a href="<?= base_url() ?>/Mattes/Arrendador/Detalle_propiedad"><i class="ionicons ion-edit h2 detalle-propiedad text-warning"></i></a>
                </figure>           
            </div>
            <div class="card-body bg-white">
                <h3>Casa 3</h3>
                <p>Estatus: disponible</p>
            </div>
        </div>
        <div class="col-md-6 col-lg-4">
            <div class="card">
                <figure>
                    <img class="img-fluid" src="<?= base_url() ?>/../../assets/img/anuncio4.jpg" alt="Casa en renta">
                    <a href="<?= base_url() ?>/Mattes/Arrendador/Detalle_propiedad"><i class="ionicons ion-edit h2 detalle-propiedad text-warning"></i></a>
                </figure>                    
            </div>
            <div class="card-body bg-white">
                <h3>Casa 4</h3>
                <p>Estatus: disponible</p>
            </div>
        </div>
        <div class="col-md-6 col-lg-4">
            <div class="card">
                <figure>
                    <img class="img-fluid" src="<?= base_url() ?>/../../assets/img/anuncio5.jpg" alt="Casa en renta">
                    <i class="ionicons ion-android-checkbox-outline h2 verifica-propiedad"></i>
                    <i class="ionicons ion-ios-bolt h1 posiciona-propiedad"></i>
                    <a href="<?= base_url() ?>/Mattes/Arrendador/Detalle_propiedad"><i class="ionicons ion-edit h2 detalle-propiedad text-warning"></i></a>
                </figure>                     
            </div> 
            <div class="card-body bg-white">
                <h3>Casa 5</h3>
                <p>Estatus: disponible</p>
            </div>
        </div>
        <div class="col-md-6 col-lg-4">
            <div class="card">
                <figure>
                    <img class="img-fluid" src="<?= base_url() ?>/../../assets/img/anuncio6.jpg" alt="Casa en renta">
                    <i class="ionicons ion-checkmark-circled h2 mr-5 sello-mattes"></i>
                    <i class="ionicons ion-android-checkbox-outline h2 verifica-propiedad"></i>
                    <a href="<?= base_url() ?>/Mattes/Arrendador/Detalle_propiedad"><i class="ionicons ion-edit h2 detalle-propiedad text-warning"></i></a>
                </figure>             
            </div>
            <div class="card-body bg-white">
                <h3>Casa 6</h3>
                <p>Estatus: disponible</p>
            </div>
        </div>
    </div>
</section>