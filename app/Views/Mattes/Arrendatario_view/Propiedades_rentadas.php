<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="
    crossorigin="anonymous"></script>

<link href="<?= base_url() ?>/assets/lib/SpinKit/spinkit.css" rel="stylesheet">
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/toastify-js"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">

<script src="https://cdnjs.cloudflare.com/ajax/libs/paginationjs/2.1.5/pagination.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/paginationjs/2.1.5/pagination.css" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/paginationjs/2.1.5/pagination.js"></script>

<script src="https://unpkg.com/masonry-layout@4/dist/masonry.pkgd.min.js"></script>
<!-- or -->
<script src="https://unpkg.com/masonry-layout@4/dist/masonry.pkgd.js"></script>

<script src="https://unpkg.com/imagesloaded@5/imagesloaded.pkgd.min.js"></script>
<!-- or -->
<script src="https://unpkg.com/imagesloaded@5/imagesloaded.pkgd.js"></script>

<div class="alert bg-warning mg-t-100 d-none" id="succes-alert" role="alert">
    <button type="button" class="close" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
    <div class="d-flex align-items-center justify-content-start">
        <i class="fa fa-exclamation-triangle alert-icon tx-32 mg-t-5 mg-xs-t-0"></i>
        <span>SU CORREO ELECTRÓNICO NO HA SIDO VERIFICADO, POR FAVOR VERIFIQUE SU BANDEJA DE ENTRADA <span id="success"></span></span>
    </div><!-- d-flex -->
</div><!-- alert -->

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

<section class="container casas mb-200 height-rent">
    <h3 class="mg-t-120 text-center propiedades-rentadas">Propiedades rentadas</h3>
    <div id="estrellas" class="starrr mg-b-10"></div>
    <div class="grid mx-auto mg-t-20">
        
    </div>

</section>

<form method="POST" id="propiedad_id" >
    <input class="id_propiedad" type="hidden" name="id" id="id">
</form>


