<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
<link href="<?= base_url() ?>../../../assets/lib/SpinKit/spinkit.css" rel="stylesheet">

<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/toastify-js"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">

<script src="https://cdnjs.cloudflare.com/ajax/libs/paginationjs/2.1.5/pagination.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/paginationjs/2.1.5/pagination.css" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/paginationjs/2.1.5/pagination.js"></script>


<link href="http://netdna.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet" />
<script src="https://momentjs.com/downloads/moment-with-locales.min.js"></script>

<link rel="stylesheet" href="../../../../../../assets/lib/Carousel/owlcarousel/owl.carousel.min.css">
<link rel="stylesheet" href="../../../../../../assets/lib/Carousel/owlcarousel/owl.theme.default.min.css">


<div id="loader" class="modal fade show load">
	<div class="modal-dialog modal-dialog-vertical-center" role="document">
		<div class="d-flex ht-300 pos-relative align-items-center">
			<div class="sk-chasing-dots">
				<div class="sk-child sk-dot1 bg-red-800"></div>
				<div class="sk-child sk-dot2 bg-green-800"></div>
			</div>
		</div>
	</div>
</div>

<style>
	.load {
		display: none !important;
		padding-left: 0px;
	}
	.mg-b-150{
		margin-bottom: 150px;
	}
</style>

<div class="container mg-t-65 mg-b-150">
	<div class="row">
		<div class="col-12 text-center mg-t-100">
			<h2 class="titulo-prop text-uppercase title mg-b-10">Propiedad </h2>
			<hr>
			<p>Califica tu estacia en esta propiedad seleccionando el número de estrellas que desees</p>
			<div id="estrellas" class="starrr mg-b-10"></div>
		</div>
	</div>

	<div class="col-sm-12 shadow-sm p-3 mb-5 bg-body rounded border mt-4">
		<h4 class="title">Comentanos tu experiencia al vivir de esta propiedad</h4>
		
		<hr>
		<form id="form-comment" enctype="multipart/form-data" class="group">

			<div class="row mg-t-20">
				
				<div class="col-sm-8 mg-t-10 mg-sm-t-0 mg-b-10">
					<textarea id="comment" name="comment" class="form-control select2" placeholder="Comentarios" pattern="[a-zA-ZñÑáéíóúÁÉÍÓÚ\s]+" minlength="10" maxlength="140" required></textarea>
					<input class="propiedad" type="hidden" name="propiedad" id="propiedad">
					<input type="text" name="valor" id="valor">
				</div>
				<div class="col-sm-8 col-lg-4 col-md-4 mg-md-t-5 text-center">
					<button id="send-comment" class="col-6 calificar" type="submit"><i class="fa fa-star" aria-hidden="true"></i> Enviar</button>
				</div>
			</div>

		</form>
		<div class="questions"></div>
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
</script>