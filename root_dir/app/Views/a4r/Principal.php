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
<style>
    .section-slider{
        height: auto !important;
    }
    .attraction-maps{
        overflow: inherit !important;
    }
</style>

 <!-- BANNER SLIDER -->
<section class="section-slider">
    <h1 class="element-invisible">Slider</h1>
    <div id="slider-revolution">
        <ul>
            <li data-transition="fade">
                <img src="<?= base_url('templates/7 The lotus hotel/landing.engotheme.com/html/lotus/demo/images/slider/img-5.jpg') ?>" data-bgposition="left center" data-duration="14000" data-bgpositionend="right center" alt="">
                
                <div class="tp-caption sft fadeout slider-caption-sub slider-caption-1" data-x="center" data-y="100" data-speed="700" data-start="1500" data-easing="easeOutBack">
                    <img src="<?= base_url('templates/7 The lotus hotel/landing.engotheme.com/html/lotus/demo/images/slider/hom1-slide1.png') ?>" alt="icons"> 
                </div>

                <div class="tp-caption sft fadeout slider-caption-sub slider-caption-1" data-x="center" data-y="240" data-speed="700" data-start="1500" data-easing="easeOutBack">
                    Bienvenido a
                </div>

                <div class="tp-caption sfb fadeout slider-caption slider-caption-sub-1" data-x="center" data-y="280" data-speed="700" data-easing="easeOutBack"  data-start="2000">THE LOTUS HOTEL</div>
                
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
<section class="ot-about mt60">
    <div class="container">
        <div class="content">
            <div class="row">
                <div class="col col-xs-12 col-lg-6 col-lg-offset-3">
                    <div class="ot-heading mb40 row-20 text-center">
                        <h2>Acerca de Plataforma 4R</h2>
                        <p class="sub pr10 pl10">
                            It is a long established fact that a reader will be distracted by the readable content
                            of a page when looking at its layout
                        </p>
                    </div>
                </div>
            </div>
            <div class="img-hover-box mb40">
                <div class="img">
                    <img src="<?= base_url('templates/7 The lotus hotel/landing.engotheme.com/html/lotus/demo/images/home-3/about-hill.png') ?>" data-bgposition="left center" data-duration="14000" data-bgpositionend="right center" alt="">
                </div>
            </div>
            <div class="text-center mt40 mb30 featured">
                <p class="font-hind f-500 f20">Brent Conrad talks with everyone from, frequent travelers to the busy
                    family that can
                    only get away for vacation every couple of years. </p>
            </div>
            <div class="row">
                <div class="col-xs-12 col-sm-10 col-sm-offset-1">
                    <div class="details">
                        <div class="row">
                            <div class="col-xs-12 col-sm-6">
                                <p class="font-hind f14 pr15">
                                    The cards are being handed out by quarantine officials at Chicago,
                                    O’Hare International Airport; Los Angeles; old York City, JFK International
                                    Airport; Newark; & San Francisco. These airports are the only U.S.
                                    airports receiving direct flights from Hong Kong. No U.S. airports
                                    receive direct flights from Hanoi or the Guangdong Province. CDC officials
                                    expect to expand the distribution of
                                </p>
                            </div>
                            <div class="col-xs-12 col-sm-6">
                                <p class="font-hind f14 pl15">
                                    The Centers for Disease Control & Prevention (CDC) on Saturday began
                                    distributing cards at airports receiving flights returning directly from Hong
                                    Kong warning travelers returning to the United States from Hong Kong & Guangdong
                                    Province, People’s Republic of China & Hanoi,
                                    Vietnam that they may have been exposed to cases of severe acute respiratory
                                    syndrome (SARS).
                                </p>
                            </div>
                        </div>
                        <!-- <div class="text-center">
                            <a href="%21.html#" class="awe-btn awe-btn-default mt30 mb30 font-hind f12 bold btn-medium"
                                target="_blank">Read more</a>
                        </div> -->
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
