<!-- EXTENDIENDO EL LAYOUT PRINCIPAL -->
<?= $this->extend('layout/main') ?>

<!--LIBRERIAS DINAMICAS PARA CSS-->
<?= $this->section('css') ?>
<!-- Aquí puedes agregar hojas de estilo específicas para esta vista -->
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
</style>

 <!-- BANNER SLIDER -->
<section class="section-slider">
    <h1 class="element-invisible">Slider</h1>
    <div id="slider-revolution">
        <ul>
            <li data-transition="fade">
                <img src="<?= base_url() ?>/../../assets/img/a4r/home.png" data-bgposition="left center" data-duration="14000" data-bgpositionend="center" alt="">

                <div class="tp-caption sft fadeout slider-caption-sub slider-caption-1" data-x="left" data-y="240" data-speed="700" data-start="1500" data-easing="easeOutBack">
                    <h2 style="font-weight:bold;">¡Encuentra la casa de tus sueños!</h2>
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
                <div class="col col-xs-12">
                    <div class="ot-heading mb40 row-20">
                        <h3 class="text-center">Casas en venta</h3>
                        <p class="sub pr10 pl10">
                            Descubre nuestras mejores ofertas en casas en venta. Encuentra la casa de tus sueños con nosotros. Tenemos una amplia selección de propiedades para satisfacer tus necesidades y presupuesto. ¡Explora nuestras opciones hoy mismo!
                        </p>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="accomd-modations-room">
                        <div class="img">
                            <img src="<?= base_url('templates/7 The lotus hotel/landing.engotheme.com/html/lotus/demo/images/room/list/img-2.jpg') ?>" alt="">
                        </div>
                        <div class="text">
                            <h2>Casa moderna</h2>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- END / ABOUT -->

<!--HTML-->


<?= $this->endSection() ?>

<?= $this->section('scripts') ?>
    <script>
        // Aquí van los scripts específicos de esta página
    </script>
<?= $this->endSection() ?>
