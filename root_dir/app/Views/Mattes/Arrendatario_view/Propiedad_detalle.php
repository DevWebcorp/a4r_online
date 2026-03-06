

<!-- EXTENDIENDO EL LAYOUT PRINCIPAL -->
<?= $this->extend('layout/main') ?>

<!--LIBRERIAS DINAMICAS PARA CSS-->
<?= $this->section('css') ?>
<!-- Aquí puedes agregar hojas de estilo específicas para esta vista -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/paginationjs/2.1.5/pagination.css" />
	<link href="http://netdna.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/fullcalendar@5.9.0/main.min.css">
	<link rel="stylesheet" href="/assets/lib/Carousel/owlcarousel/owl.carousel.min.css">
	<link rel="stylesheet" href="/assets/lib/Carousel/owlcarousel/owl.theme.default.min.css">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@tarekraafat/autocomplete.js@10.2.7/dist/css/autoComplete.01.min.css">


    <link href="<?= base_url() ?>/assets/lib/SpinKit/spinkit.css" rel="stylesheet">    
    <link href="<?= base_url() ?>/assets/css/estilos.css" rel="stylesheet">
<?= $this->endSection() ?>

<!-- CONTENIDO DINAMICO -->
<?= $this->section('content') ?>
<?= $this->include('Layout/header_arrendatario') ?>

<div id="loader" class="modal fade show load">
	<div class="modal-dialog modal-dialog-vertical-center" role="document">
		<div class="d-flex ht-300 pos-relative align-items-center">
			<div class="sk-chasing-dots">
				<div class="sk-child sk-dot1 bg-red-800"></div>
				<div class="sk-child sk-dot2 bg-green-800"></div>
			</div>
		</div>
	</div>
	<!-- <img src="<?= base_url() ?>/../../assets/img/Iconos_Mattes/Iconos/Mattes_Logo.png" alt="Logo mattes" class="img-fluid logo"> -->
</div>

<style>
	.load {
		display: none !important;
		padding-left: 0px;
	}
	.compartir{
		position: inherit;
	}
	/* .fade.show{
		background-color: black !important;
		opacity: 50;
		
	} */

	/*  .carousel-inner {
		width: 100% !important;
		max-height: 380px !important;
	} */
	.fa-heart{
		color: red !important;
	}
	.icon{
		border: 2px solid #eea236;
		margin-right: 6px;
	}
	#agendar_cita{
		font-size: 18px;
		padding: .7em 2em;
		text-transform: uppercase;
		border-radius: 0px;
	}
	#btn_wa{
		border-color: #4cae4c;
		color: #4cae4c;
		font-size: 18px;
		padding: .7em 2em;
		text-transform: uppercase;
	}
	#btn_wa:hover {
		border-color: #4cae4c;
		background-color: #4cae4c;
		box-shadow: inset 0 0 0 2em #4cae4c;
		color: #fff;
	}
	.precio > h1{
		font-weight: bold !important;
	}
	.form-control {
		border: 2px solid black;
	}
	#send-questions{
		padding: .7em 1em;
		border-radius: 0px;
	}

</style>

<!-- <div class="alert bg-warning mg-t-120 d-none" id="succes-alert" role="alert">
    <button type="button" class="close" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
    <div class="d-flex align-items-center justify-content-start">
        <i class="fa fa-exclamation-triangle alert-icon tx-32 mg-t-5 mg-xs-t-0"></i>
        <span>SU CORREO ELECTRÓNICO NO HA SIDO VERIFICADO, POR FAVOR VERIFIQUE SU BANDEJA DE ENTRADA <span id="success"></span></span>
    </div>
</div> -->

<section class="section-sub-banner bg-16">
    <div class="sub-banner">
        <div class="container">
            <div class="text text-center">
                <h2 class="titulo-prop text-uppercase title"></h2>
            </div>
        </div>
    </div>
</section>

<div class="container mg-b-150">
	<div class="row mg-t-30">
		<div class="col-12 col-md-3 text-center">
			<h2 class="titulo-prop text-uppercase title"></h2>
			<div id="estrellas" class="starrr mg-b-10"></div>
		</div>

		<div class="col-12 col-md-2 text-center favorito-btn group"></div>

		<div class="col-12 col-md-4 text-center">
			<a class="compartir" href="javascript:getlink();"><i class="fa fa-share-alt" aria-hidden="true"></i> Compartir</a>
		</div>
	</div>


	<div class="row">
		<div id="wrap" class="col-lg-8 mt-5 my-lg-5 text-center">
			<div id="c-principal" class="col-12 shadow-sm p-3 mb-2 bg-body rounded border bg-light">
				<!-- Carousel -->
				<div id="carousel" class="carousel slide gallery" data-ride="carousel">
					<div class="carousel-inner c-inicio">
					</div>
					<a class="carousel-control-prev" href="#carousel" role="button" data-slide="prev">
						<span class="carousel-control-prev-icon" aria-hidden="true"></span>
						<span class="sr-only">Anterior</span>
					</a>
					<a class="carousel-control-next" href="#carousel" role="button" data-slide="next">
						<span class="carousel-control-next-icon" aria-hidden="true"></span>
						<span class="sr-only">Siguiente</span>
					</a>					
				</div>
				<!-- Carousel Navigatiom -->
				<div id="carousel-thumbs" class="carousel slide" data-ride="carousel">
					<div class="carousel-inner">
						<div class="carousel-item active" data-slide-number="0">
							<div class="row mx-0 thumbs">
								
							</div>
						</div>
						<div id="#prueba">
						</div>
						
					</div>
					<a class="carousel-control-prev" href="#carousel-thumbs" role="button" data-slide="prev">
						<span class="carousel-control-prev-icon" aria-hidden="true"></span>
						<span class="sr-only">Anterior</span>
					</a>
					<a class="carousel-control-next" href="#carousel-thumbs" role="button" data-slide="next">
						<span class="carousel-control-next-icon" aria-hidden="true"></span>
						<span class="sr-only">Siguiente</span>
					</a>
				</div>
			</div>
			<!--descripcion -->
			<div class="col-12 shadow-sm p-3 mb-2 bg-body rounded border mt-3 bg-light">
				<h3 class="title">Descripción</h3>
				<!-- <img src="<?= base_url() ?>/assets/icons/recibo.gif" alt="Computer man" style="width:48px;height:48px;">
				<hr> -->
				<p class="info-des mt-2"></p>
			</div>
			<!--Detalles -->
			<div class="col-12 shadow-sm p-3 mt-3 mb-2 bg-body rounded border bg-light text-center">
				<h3 class="title">Detalles</h3>
				<!-- <img src="<?= base_url() ?>/assets/icons/edificio.gif" alt="Computer man" style="width:48px;height:48px;">
				<hr> -->
				<div class="detalles info-prop"></div>
			</div>
			<div class="col-12 text-left">
				<h3 class="servicios">Servicios</h3>
				<p>Estos son los servicios con los que cuenta esta propiedad</p>
				<div id="iconos" class="d-flex justify-content-between iconos-s mg-t-10"></div>
			</div>
		</div>

		<div class="col-lg-4 propietario text-center mt-lg-precio">
			<div class="col-12">
				<!-- <h3 class="title">Precio</h3>
				<img src="<?= base_url() ?>/assets/icons/precio.gif" alt="Computer man" style="width:48px;height:48px;">
				<hr> -->
				<div class="precio"></div>
			</div>
			<div id="datos_inmob" class="col-12 shadow-sm p-3 mb-3 bg-body rounded border  propietario text-center mt-6 bg-light">
				<h3 class="title">Contacto</h3>
				<img src="<?= base_url() ?>/assets/icons/fax.gif" alt="Computer man" style="width:48px;height:48px;">
				<hr>
				<figure class="photo-prop"></figure>
				<p class="info-nprop mt-2"></p>
				<p id="n_inmobiliaria"></p>
				<p class="telefono"></p>
				<p class="correo"></p>
				<hr>

				<?php 
					if(isset($alumno_verify)){
						if($alumno_verify){
							echo('<button id = "agendar_cita" class="col-12 mg-t-5 mg-l-5 agendar-cita btn-efect group-btn fill"><i class="fa fa-calendar" aria-hidden="true"></i> Agendar cita</button>');
							echo('<button id="btn_wa" class="col-12 mg-t-5 mg-l-5 btn-efect group-btn fill" style="right:10px;"><i class="fa fa-whatsapp fa-lg" aria-hidden="true"></i> Enviar Mensaje</button>');
						}
						
					}else{
						echo('<button id = "agendar_cita" class="col-12 mg-t-5 mg-l-5 agendar-cita btn-efect group-btn fill"><i class="fa fa-calendar" aria-hidden="true"></i> Agendar cita</button>');
						echo('<button id="btn_wa" class="col-12 mg-t-5 mg-l-5 btn-efect group-btn fill" style="right:10px;"><i class="fa fa-whatsapp fa-lg" aria-hidden="true"></i> Enviar Mensaje</button>');

					}

				?>
				<!-- <button id="btn_rentar" class="col-12 mg-t-5 mg-l-5 rentar-casa btn-efect group-btn up"><i class="fa fa-credit-card-alt" aria-hidden="true"></i> Rentar</button> -->
			</div>		

		</div>

		<div class="col-12">
			<h3 class="title">Ubicación de la propiedad</h3>
			<!-- <img src="<?= base_url() ?>/assets/icons/casa.gif" alt="Computer man" style="width:48px;height:48px;">
			<hr> -->
			<!-- <div class="distancia info-prop mg-t-10">Distancia a la universidad: </div> -->
			<div class="col-12 mg-b-50  mt-2" id="map" style="height: 320px;"></div>
		</div>
	</div>
	

	<div class="col-12 shadow-sm p-3 pb-lg-5 mb-3 bg-body rounded border mt-2 mt-lg-4">
		<h3 class="title">Preguntas y respuestas</h3>
		<hr>
		<h5 class="mensaje text-center">Inicia sesión para preguntarle al propietario</h5>
		<form id="form-questions" enctype="multipart/form-data" class="group">
			<div class="row mg-t-20">
				<div class="col-sm-8 mg-t-10 mg-sm-t-0 mg-b-10">
					<input id="dudas" name="dudas" class="form-control select2" placeholder="Deja tus preguntas y dudas aquí" required>
					<input class="propiedad" type="hidden" name="propiedad" id="propiedad">
				</div>
				<div class="col-sm-8 col-lg-4 col-md-4 mg-md-t-5 text-center">
					<button id="send-questions" class="col-6 enviar-dudas" type="submit"><i class="fa fa-question-circle" aria-hidden="true"></i> Enviar</button>
				</div>
			</div>
		</form>
		<div class="questions"></div>
	</div>

	<!-- <div class="col-sm-12 shadow-sm p-3 mb-5 bg-body rounded border mt-4">
		<div class="buttons">
			<h1>Simple hover effects with <code>box-shadow</code></h1>
			<button class="btn-efect fill">Fill In</button>
			<button class="btn-efect pulse">Pulse</button>
			<button class="btn-efect close">Close</button>
			<button class="btn-efect raise">Raise</button>
			<button class="btn-efect up">Fill Up</button>
			<button class="btn-efect slide">Slide</button>
			<button class="btn-efect offset">Offset</button>
		</div>
	</div> -->



	<div class="col-12 shadow-sm p-3 mb-5 bg-body rounded border mt-3 mt-lg-4 opinions">
		<h3 class="title">Reseñas</h3>
		<hr>
	</div>

</div>

<form method="POST" id="propiedad_id">
	<input class="id_propiedad" type="hidden" name="id" id="id">
	<input class="id_propiedatio" type="hidden" name="propietario" id="propietario">
</form>

<script>
	let id_propiedad = <?php echo json_encode($id_propiedad); ?>;
	let name_property = <?php echo json_encode($nombre_popiedad); ?>;
	let group = <?php echo json_encode($group); ?>;
	let verify = <?php echo json_encode($verify); ?>;
</script>





<style>
	.title {
		font-family: "Gothicb" !important;
		color: var(--mattes);
	}

	.tb-max {
		width: 296px !important;
		height: 100px !important;
		max-height: 100px !important;

	}

	.w-new {
		width: 713px !important;
		height: 500px !important;
		max-height: 500px !important;

	}

	.carousel {
		position: relative;
	}

	.carousel-item img {
		object-fit: cover;
	}

	#carousel-thumbs {
		background: #f0f0f0;
		padding: 0 50px;
	}

	#carousel-thumbs img:hover {
		opacity: 100%;
	}

	#carousel-thumbs img {
		opacity: 80%;
		border: 3px solid transparent;
		cursor: pointer;
	}

	#carousel-thumbs .selected img {
		opacity: 100%;
	}

	.carousel-control-prev,
	.carousel-control-next {
		width: 50px;
	}

	.carousel-fullscreen-icon {
		position: absolute;
		top: 1rem;
		left: 1rem;
		width: 1.75rem;
		height: 1.75rem;
		z-index: 4;
		background-image: url("data:image/svg+xml;charset=utf8,%3Csvg xmlns='http://www.w3.org/2000/svg' fill='rgba(255,255,255,.80)'  viewBox='0 0 16 16'%3E%3Cpath d='M1.5 1a.5.5 0 0 0-.5.5v4a.5.5 0 0 1-1 0v-4A1.5 1.5 0 0 1 1.5 0h4a.5.5 0 0 1 0 1h-4zM10 .5a.5.5 0 0 1 .5-.5h4A1.5 1.5 0 0 1 16 1.5v4a.5.5 0 0 1-1 0v-4a.5.5 0 0 0-.5-.5h-4a.5.5 0 0 1-.5-.5zM.5 10a.5.5 0 0 1 .5.5v4a.5.5 0 0 0 .5.5h4a.5.5 0 0 1 0 1h-4A1.5 1.5 0 0 1 0 14.5v-4a.5.5 0 0 1 .5-.5zm15 0a.5.5 0 0 1 .5.5v4a1.5 1.5 0 0 1-1.5 1.5h-4a.5.5 0 0 1 0-1h4a.5.5 0 0 0 .5-.5v-4a.5.5 0 0 1 .5-.5z' /%3E%3C/svg%3E");
	}

	.carousel-fullscreen-icon:hover {
		background-image: url("data:image/svg+xml;charset=utf8,%3Csvg xmlns='http://www.w3.org/2000/svg' fill='rgb(255,255,255)' viewBox='0 0 16 16'%3E%3Cpath d='M1.5 1a.5.5 0 0 0-.5.5v4a.5.5 0 0 1-1 0v-4A1.5 1.5 0 0 1 1.5 0h4a.5.5 0 0 1 0 1h-4zM10 .5a.5.5 0 0 1 .5-.5h4A1.5 1.5 0 0 1 16 1.5v4a.5.5 0 0 1-1 0v-4a.5.5 0 0 0-.5-.5h-4a.5.5 0 0 1-.5-.5zM.5 10a.5.5 0 0 1 .5.5v4a.5.5 0 0 0 .5.5h4a.5.5 0 0 1 0 1h-4A1.5 1.5 0 0 1 0 14.5v-4a.5.5 0 0 1 .5-.5zm15 0a.5.5 0 0 1 .5.5v4a1.5 1.5 0 0 1-1.5 1.5h-4a.5.5 0 0 1 0-1h4a.5.5 0 0 0 .5-.5v-4a.5.5 0 0 1 .5-.5z' /%3E%3C/svg%3E");
	}

	.pause .carousel-pause-icon {
		position: absolute;
		top: 3.75rem;
		left: 1rem;
		width: 1.75rem;
		height: 1.75rem;
		z-index: 4;
		background-image: url("data:image/svg+xml;charset=utf8,%3Csvg xmlns='http://www.w3.org/2000/svg' fill='rgba(255,255,255,.80)'  viewBox='0 0 16 16'%3E%3Cpath d='M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM6.25 5C5.56 5 5 5.56 5 6.25v3.5a1.25 1.25 0 1 0 2.5 0v-3.5C7.5 5.56 6.94 5 6.25 5zm3.5 0c-.69 0-1.25.56-1.25 1.25v3.5a1.25 1.25 0 1 0 2.5 0v-3.5C11 5.56 10.44 5 9.75 5z' /%3E%3C/svg%3E");
	}

	.pause .carousel-pause-icon:hover {
		background-image: url("data:image/svg+xml;charset=utf8,%3Csvg xmlns='http://www.w3.org/2000/svg' fill='rgb(255,255,255)'  viewBox='0 0 16 16'%3E%3Cpath d='M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM6.25 5C5.56 5 5 5.56 5 6.25v3.5a1.25 1.25 0 1 0 2.5 0v-3.5C7.5 5.56 6.94 5 6.25 5zm3.5 0c-.69 0-1.25.56-1.25 1.25v3.5a1.25 1.25 0 1 0 2.5 0v-3.5C11 5.56 10.44 5 9.75 5z' /%3E%3C/svg%3E");
	}

	.play .carousel-pause-icon {
		position: absolute;
		top: 3.75rem;
		left: 1rem;
		width: 1.75rem;
		height: 1.75rem;
		z-index: 4;
		background-image: url("data:image/svg+xml;charset=utf8,%3Csvg xmlns='http://www.w3.org/2000/svg' fill='rgba(255,255,255,.80)'  viewBox='0 0 16 16'%3E%3Cpath d='M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM6.79 5.093A.5.5 0 0 0 6 5.5v5a.5.5 0 0 0 .79.407l3.5-2.5a.5.5 0 0 0 0-.814l-3.5-2.5z' /%3E%3C/svg%3E");
	}

	.play .carousel-pause-icon:hover {
		background-image: url("data:image/svg+xml;charset=utf8,%3Csvg xmlns='http://www.w3.org/2000/svg' fill='rgb(255,255,255)'  viewBox='0 0 16 16'%3E%3Cpath d='M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM6.79 5.093A.5.5 0 0 0 6 5.5v5a.5.5 0 0 0 .79.407l3.5-2.5a.5.5 0 0 0 0-.814l-3.5-2.5z' /%3E%3C/svg%3E");
	}

	#carousel-thumbs .carousel-control-prev-icon {
		background-image: url("data:image/svg+xml;charset=utf8,%3Csvg xmlns='http://www.w3.org/2000/svg' fill='rgba(0,0,0,.60)' viewBox='0 0 8 8'%3E%3Cpath d='M5.25 0l-4 4 4 4 1.5-1.5-2.5-2.5 2.5-2.5-1.5-1.5z'/%3E%3C/svg%3E") !important;
	}

	#carousel-thumbs .carousel-control-next-icon {
		background-image: url("data:image/svg+xml;charset=utf8,%3Csvg xmlns='http://www.w3.org/2000/svg' fill='%60000' viewBox='0 0 8 8'%3E%3Cpath d='M2.75 0l-1.5 1.5 2.5 2.5-2.5 2.5 1.5 1.5 4-4-4-4z'/%3E%3C/svg%3E") !important;
	}

	.modal-content {
		border-radius: 0;
		background-color: transparent;
		border: none;
	}

	#lightbox-container-image img {
		width: auto;
		max-height: 520px;
	}
</style>

<?= $this->endSection() ?>

<?= $this->section('scripts') ?>  

<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>

<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/toastify-js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/paginationjs/2.1.5/pagination.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/paginationjs/2.1.5/pagination.js"></script>

<script src="https://momentjs.com/downloads/moment-with-locales.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
	/*  $("[id^=carousel-thumbs]").carousel({
	interval: false
}); */

	/** Pause/Play Button **/
	$(".carousel-pause").click(function() {
		var id = $(this).attr("href");
		if ($(this).hasClass("pause")) {
			$(this).removeClass("pause").toggleClass("play");
			$(this).children(".sr-only").text("Play");
			$(id).carousel("pause");
		} else {
			$(this).removeClass("play").toggleClass("pause");
			$(this).children(".sr-only").text("Pause");
			$(id).carousel("cycle");
		}
		$(id).carousel;
	});

	/** Fullscreen Buttun **/
	$(".carousel-fullscreen").click(function() {
		var id = $(this).attr("href");
		$(id).find(".active").ekkoLightbox({
			type: "image"
		});
	});

	if ($("[id^=carousel-thumbs] .carousel-item").length < 2) {
		$("#carousel-thumbs [class^=carousel-control-]").remove();
		$("#carousel-thumbs").css("padding", "0 5px");
	}

	$("#carousel").on("slide.bs.carousel", function(e) {
		var id = parseInt($(e.relatedTarget).attr("data-slide-number"));
		var thumbNum = parseInt(
			$("[id=carousel-selector-" + id + "]")
			.parent()
			.parent()
			.attr("data-slide-number")
		);
		$("[id^=carousel-selector-]").removeClass("selected");
		$("[id=carousel-selector-" + id + "]").addClass("selected");
		$("#carousel-thumbs").carousel(thumbNum);
	});
</script>

<?= $this->endSection() ?>

