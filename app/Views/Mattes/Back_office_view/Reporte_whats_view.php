<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/toastify-js"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">
<script src="https://momentjs.com/downloads/moment-with-locales.min.js"></script>

<link href="<?= base_url() ?>assets/lib/SpinKit/spinkit.css" rel="stylesheet">

<section class=" mg-t-120 mg-b-40 altura-alumnos">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h3 class="reporte mt-3">REPORTE DE CONTACTO POR WHATSAPP</h5>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-12 mg-b-100 mb-lg-5">                
                <table id="reporte_contacto" class="table display  table-responsive tabla-alumnos" style="display: block; width: 100%; background-color: transparent; ">
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