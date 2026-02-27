<!-- EXTENDIENDO EL LAYOUT PRINCIPAL -->
<?= $this->extend('layout/main') ?>

<!--LIBRERIAS DINAMICAS PARA CSS-->
<?= $this->section('css') ?>
<!-- Aquí puedes agregar hojas de estilo específicas para esta vista -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@tarekraafat/autocomplete.js@10.2.7/dist/css/autoComplete.01.min.css">
    <link href="<?= base_url() ?>/assets/lib/SpinKit/spinkit.css" rel="stylesheet">
    
    <link href="<?= base_url() ?>/assets/css/estilos.css" rel="stylesheet">
<?= $this->endSection() ?>

<!-- CONTENIDO DINAMICO -->
<?= $this->section('content') ?>

<section class="propiedades-tabla mb-200 mg-t-90 height-propiedades">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h3 class="text-center mt-3">Propiedades</h4>
</div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <table id="propiedades" class="table display table-responsive mt-3 tablas_mattes" style="width: 100%;">
                    <thead class="sorting_asc sorting_desc">
                        <tr>
                            <th class="wd-15p">Propiedad</th>
                            <th class="wd-15p">Estado</th>
                            <th class="wd-15p">Dirección</th>
                            <th class="wd-15p">Universidad</th>
                            <th class="wd-15p">Fecha alta</th>
                            <th class="wd-15p">Fecha actualizacion</th>
                        </tr>
                    </thead>
                    <tbody>
                                               
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>

<?= $this->endSection() ?>

<?= $this->section('scripts') ?>    
<script src="https://momentjs.com/downloads/moment-with-locales.min.js"></script>

<?= $this->endSection() ?>

