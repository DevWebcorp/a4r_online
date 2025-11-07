<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/toastify-js"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">
<script src="https://momentjs.com/downloads/moment-with-locales.min.js"></script>

<link href="<?= base_url() ?>assets/lib/SpinKit/spinkit.css" rel="stylesheet">

<section class="propiedades mg-t-120 mg-b-40 altura-alumnos">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h3 class="alumnos mt-3">Alumnos</h5>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 mg-b-100 mb-lg-5">                
                <table id="data-alumnos" class="table display  table-responsive tabla-alumnos" style="display: block; width: 100%; background-color: transparent; ">
                    <thead class="sorting_asc sorting_desc">
                        <tr>
                            <th>Alumno</th>
                            <th class="text-center" scope="col">Universidad</th>
                            <th>Carrera</th>
                            <th>Estado</th>
                            <th>Fecha registro</th>
                            <th>Celular</th>
                            <th>Correo</th>
                        </tr>
                    </thead>
                    <tbody></tbody>
                </table>
            </div>
        </div>
    </div>
</section>