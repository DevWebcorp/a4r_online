<!-- EXTENDIENDO EL LAYOUT PRINCIPAL -->
<?= $this->extend('layout/main') ?>

<!--LIBRERIAS DINAMICAS PARA CSS-->
<?= $this->section('css') ?>
<!-- Aquí puedes agregar hojas de estilo específicas para esta vista -->
 <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="<?= base_url('/../templates/7 The lotus hotel/landing.engotheme.com/html/lotus/demo/css/helper.css') ?>">
<link rel="stylesheet" type="text/css" href="<?= base_url('/../templates/7 The lotus hotel/landing.engotheme.com/html/lotus/demo/css/custom.css') ?>">
<link rel="stylesheet" type="text/css" href="<?= base_url('/../templates/7 The lotus hotel/landing.engotheme.com/html/lotus/demo/css/responsive.css') ?>">

<?= $this->endSection() ?>

<!-- CONTENIDO DINAMICO -->
<?= $this->section('content') ?>

<?= $this->include('Layout/header') ?>

<style>
    .section-slider{
        height: auto !important;
    }
    .attraction-maps{
        overflow: inherit !important;
    }
    .slider-caption-sub {
        color: #000;
        text-transform: initial;
    }
    .btn-primary{
        font-size: 16px;
    }
    .header_logo { 
        margin-top: 14px;
    }
</style>

 <!-- BANNER SLIDER -->
<section class="section-slider">
    <h1 class="element-invisible">Slider</h1>
    <div id="slider-revolution">
        <ul>
            <li data-transition="fade">
                <img src="<?= base_url() ?>/../../assets/img/a4r/home.png"  class="img-fluid" data-duration="14000" data-bgposition="top center" data-bgpositionend="center" alt="">

                <div class="tp-caption sft fadeout slider-caption-sub slider-caption-1" data-x="left" data-y="240" data-speed="700" data-start="1500" data-easing="easeOutBack">
                    <h2 class="display-4" style="font-weight:bold;">¡Encuentra la casa de tus sueños!</h2>
                </div>

                <div class="tp-caption sft fadeout slider-caption-sub slider-caption-1" data-x="left" data-y="280" data-speed="700" data-easing="easeOutBack"  data-start="2000">
                    <p class=" pb-5">Explora las mejores opciones de casas en venta y encuentra el hogar ideal para ti y tu familia</p>
                    <button class="btn btn-primary mt-4">
                        <i class="fa fa-search" aria-hidden="true"></i>
                        Ver casas en venta</button>
                </div>

                
            </li> 

            <li data-transition="fade">
                <img src="<?= base_url('templates/7 The lotus hotel/landing.engotheme.com/html/lotus/demo/images/slider/img-4.jpg') ?>" data-bgposition="left center" data-duration="14000" data-bgpositionend="right center" alt="">
                
                <div class="tp-caption sft fadeout" data-x="center" data-y="195" data-speed="700" data-start="1300" data-easing="easeOutBack">
                    <img src="<?= base_url('templates/7 The lotus hotel/landing.engotheme.com/html/lotus/demo/images/slider/icon-slider-1.png') ?>" alt="">
                </div>
    
                <div class="tp-caption sft fadeout slider-caption-sub slider-caption-sub-3" data-x="center" data-y="220" data-speed="700" data-start="1500" data-easing="easeOutBack">
                    Cada habitacion es diferente
                </div>

                <div class="tp-caption sfb fadeout slider-caption slider-caption-3" data-x="center" data-y="260" data-speed="700" data-easing="easeOutBack"  data-start="2000">
                   60% de descuento
                </div>
                
                <div class="tp-caption sfb fadeout slider-caption-sub slider-caption-sub-3" data-x="center" data-y="365" data-easing="easeOutBack" data-speed="700" data-start="2200">Justo ahora</div>

                <div class="tp-caption sfb fadeout slider-caption-sub slider-caption-sub-3" data-x="center" data-y="395" data-easing="easeOutBack" data-speed="700" data-start="2400">
                    <img src="<?= base_url('templates/7 The lotus hotel/landing.engotheme.com/html/lotus/demo/images/slider/icon-slider-2.png') ?>" alt="">
                </div>
            </li> 
        </ul>
    </div>
</section>
<!-- END / BANNER SLIDER -->

 <!-- ABOUT -->
<section class="ot-about mt60 mg-b-60">
    <div class="container">
        <div class="content">
            <div class="row">
                <div class="col-12">
                    <div class="text-center">
                        <h2 class="font-weight-bold h1">Casas en venta</h2>
                        <p>
                            Descubre nuestras mejores propiedades disponibles.
                        </p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">                        
                        <img src="<?= base_url() ?>/../../assets/img/a4r/freepik/japanese-house-entrance-plant.jpg" alt="">
                        <div class="card-body">
                            <h2 class="font-weight-bold">Casa moderna</h2>
                            <p style="font-weight: 600">$3,200,000 MXN</p>
                            <p>3 habitaciones, 2 baños </p>
                            <button class="btn btn-primary">Ver detalles</button>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">                        
                        <img src="<?= base_url() ?>/../../assets/img/a4r/freepik/house-isolated-field.jpg" alt="">
                        <div class="card-body">
                            <h2 class="font-weight-bold">Residencia familiar</h2>
                            <p style="font-weight: 600">$5,800,000 MXN</p>
                            <p>4 habitaciones, 3 baños </p>
                            <button class="btn btn-primary">Ver detalles</button>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">                        
                        <img src="<?= base_url() ?>/../../assets/img/a4r/2575073_2.jpg" alt="">
                        <div class="card-body">
                            <h2 class="font-weight-bold">Hogar acogedor</h2>
                            <p style="font-weight: 600">$1,850,000 MXN</p>
                            <p>2 habitaciones, 1 baño </p>
                            <button class="btn btn-primary">Ver detalles</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- END / ABOUT -->

<!--HTML-->

 <!-- CONTACT -->
    <section class="section-contact">
        <div class="container">
            <div class="contact">
                <div class="row">

                    <div class="col-md-6 col-lg-5">

                        <div class="text">
                            <h2>¿Interesado en alguna casa?</h2>
                            <p>¡Contáctanos hoy mismo!</p>
                            <ul>
                                <li style="font-size:15px;"><i class="icon lotus-icon-decor"></i> Gran variedad de propiedades</li>
                                <li style="font-size:15px;"><i class="icon lotus-icon-phone"></i>Asesoría profesional</li>
                                <li style="font-size:15px;"><i class="icon lotus-icon-person"></i> Proceso sencillo y rápido</li>
                            </ul>
                        </div>

                    </div>

                    <div class="col-md-6 col-lg-6 col-lg-offset-1">
                        <div class="contact-form">
                            <form id="send-contact-form" action="https://landing.engotheme.com/html/lotus/demo/send_mail_contact.php" method="post">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <input type="text" class="field-text"  name="name" placeholder="Nombre">
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="text" class="field-text" name="email" placeholder="Correo">
                                    </div>
                                    <div class="col-sm-12">
                                        <input type="text" class="field-text" name="subject" placeholder="Teléfono">
                                    </div>
                                    <div class="col-sm-12">
                                        <input type="text" class="field-text" name="subject" placeholder="Detalles">
                                    </div>
                                    <div class="col-sm-6">
                                        <button type="submit" class="awe-btn awe-btn-13">Enviar</button>
                                    </div>
                                </div>
                                <div id="contact-content"></div>
                            </form>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>
    <!-- END / CONTACT -->

<?= $this->endSection() ?>

<?= $this->section('scripts') ?>
    <script>
        // Aquí van los scripts específicos de esta página
    </script>
<?= $this->endSection() ?>
