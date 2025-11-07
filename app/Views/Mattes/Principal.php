<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/toastify-js"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">
<link href="<?= base_url() ?>/assets/lib/SpinKit/spinkit.css" rel="stylesheet">
<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>

<script src="<?= base_url() ?>/assets/js/wow.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/tarekraafat-autocomplete.js/10.2.7/autoComplete.min.js"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@tarekraafat/autocomplete.js@10.2.7/dist/css/autoComplete.01.min.css">

<!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tarekraafat-autocomplete.js/10.2.7/css/autoComplete.min.css"> -->

<style>
    .list-group {
        list-style-type: none;
        margin: 0;
        padding: 0;
    }

    .list-group li {
        background: #eee;
        border: 1px #aaa solid;
        margin: 0;
        padding: 5px 10px;
    }

    .list-group li.active {
        color: #008;
        background: #cef;
        border: 1px #008, solid;
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



<main class="home">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="d-sm-flex flex-column align-items-center">
                    <h1 class="titulo wow bounceIn" data-wow-delay=".5s">No te compliques, <br> vive cerca de tu universidad</h1>
                    
                    <form class="collapse d-flex align-items-center mr-xl-3" id="formulario-buscar">
                        <div class="input-group">
                            <div class="input-group-append">
                                <button class="boton-buscar py-0 px-4 pl-xl-3 pr-xl-0" type="button">
                                    <i class="ionicons ion-ios-search-strong h2 ml-4 mb-0" style="margin-top: 0.2rem;"></i>
                                </button>
                            </div>
                            <input id="autoComplete" class="campo-buscar" type="search" dir="ltr" spellcheck=false autocorrect="off" autocomplete="off" autocapitalize="off">
                          <!--   <ul id="searchResult"></ul>
                            <div class="clear"></div> -->
                        </div>
                    </form>
                    
                    
                <!--     <div class="autoComplete_wrapper">
                        <input id="autoComplete" class="placeholder" type="search" dir="ltr" spellcheck=false autocorrect="off" autocomplete="off" autocapitalize="off">
                    </div> -->
                </div>
            </div>
        </div>
    </div>
</main>

<form method="POST" id="busqueda-prin" action="<?= base_url() ?>/home">
    <input type="hidden" name="uni_name" id="uni_name" class="form-control" autocomplete="off">
    <input type="hidden" name="id_univ" id="univ" class="form-control">
    <input type="hidden" name="latitud" id="latitud" class="form-control">
    <input type="hidden" name="longitud" id="longitud" class="form-control">
</form>

<div class="container mg-t-30">
    <div class="row">
        <div class="col-12">
            <div class="rombo"></div>
            <h1 class="pasos-depa ml-lg-5">Busca tu depa en solo 3 pasos:</h1>
        </div>
    </div>
</div>

<section class="ladrillos mg-t-30 wow slideInLeft" data-wow-duration=".8s" data-wow-delay=".3s">
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <div class="card justify-content-center align-items-center">
                    <div class="info">
                        <img class="img-fluid busqueda-depa" src="<?= base_url() ?>/assets/img/Iconos/Escribenos.png"></img>
                        <h3 class="text-center mt-4 ">Busca tu universidad</h3>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card justify-content-center align-items-center ">
                    <div class="info">
                        <img class="img-fluid busqueda-depa" src="<?= base_url() ?>/assets/img/Iconos/Filtrar.png"></img>
                        <h3 class="text-center mt-4 ">Filtra tu búsqueda...</h3>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card justify-content-center align-items-center">
                    <div class="info">
                        <img class="img-fluid busqueda-depa" src="<?= base_url() ?>/assets/img/Iconos/Computadora.png"></img>
                        <h3 class="text-center mt-4 ">Escoge la opción que <br> más te guste y renta</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
    new WOW().init();
</script>

<style>
    .autoComplete_wrapper > input {
        height: 72px !important;
    }
</style>


