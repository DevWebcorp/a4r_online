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

<style>
   
</style>

<section class=" ">
    <div class="container">
        <div class="row mt-5">
            <div class="col-12">
                <h3 class="text-center mt-3">REPORTE DE CONTACTO POR WHATSAPP</h5>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-12 mb-lg-5">                
                <table id="reporte_contacto" class="table display  table-responsive tabla-alumnos" style="width: 100%; background-color: transparent; ">
                    <thead class="sorting_asc sorting_desc">
                        <tr>
                            <th>Propiedad</th>
                            <th class="text-center" scope="col">Propietario</th>
                            <th>Tel. propietario</th>
                            <th>Alumno</th>
                            <th>Tel. alumno</th>
                            <th>Fecha contacto</th>
                        </tr>
                    </thead>
                    <tbody></tbody>
                </table>
            </div>
        </div>
    </div>
</section>

<?= $this->endSection() ?>

<?= $this->section('scripts') ?>   
<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/toastify-js"></script>

<script src="https://momentjs.com/downloads/moment-with-locales.min.js"></script>

<?= $this->endSection() ?>
