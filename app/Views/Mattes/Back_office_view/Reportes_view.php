<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/toastify-js"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">
<script src="https://momentjs.com/downloads/moment-with-locales.min.js"></script>

<link href="<?= base_url() ?>assets/lib/SpinKit/spinkit.css" rel="stylesheet">

<section class="propiedades mg-t-120 mg-b-120 height-reportes">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h3 class="archivos mt-3">Exportar archivos csv</h5>
            </div>
        </div>
    </div>
    <div class="container mt-5">
        <form class="mg-b-90 mb-lg-4"  enctype="multipart/form-data">
            <div class="row mg-t-40 px-3">
                <div class="col-lg-6 form__group">
                    <select id="rubro" name="rubro" class="form__input" data-placeholder="Selecciona una opción" required >
                        <option value="">Selecciona una opción</option>
                        <option value="1">Estudiantes</option>                        
                        <option value="2">Propietarios</option>
                        <option value="3">Propiedades</option>
                    </select>
                    <label class="form__label" for="rubro">Archivo a exportar<span class="tx-danger">*</span></label>
                </div>

           <!--      <div class="col-lg-6 form__group docs">
                    <select id="docs" name="docs" class="form__input" data-placeholder="Selecciona una opción" required >
                        <option value="">Selecciona el archivo</option>                        
                    </select>
                    <label class="form__label" for="docs">Archivo a exportar<span class="tx-danger">*</span></label>
                </div> -->


            </div>
                    
        </form>

        <div class="col-lg-11 row mx-auto px-0 text-md-right mt-5 docs">
                    <div class="col-sm-12 text-center text-md-right pl-lg-0">
                        <div class="d-flex flex-column flex-sm-row justify-content-center">
                            <button id="exportar" class="btn btn-teal px-4 py-1" style="font-size: 16px;"  type="button"><i class="fa fa-download" aria-hidden="true"></i> Descargar csv</button>
                        </div>
                    </div>
                </div>
        
    </div>
</section>
