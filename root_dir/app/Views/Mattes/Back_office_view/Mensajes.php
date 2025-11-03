<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/toastify-js"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">
<script src="https://momentjs.com/downloads/moment-with-locales.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/tarekraafat-autocomplete.js/10.2.7/autoComplete.min.js"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@tarekraafat/autocomplete.js@10.2.7/dist/css/autoComplete.01.min.css">


<link href="<?= base_url() ?>assets/lib/SpinKit/spinkit.css" rel="stylesheet">

<style>
    .dataTables_filter input, .modal-content {
        border-radius: 10px !important;
    }
</style>

<section class="mensajes mg-t-120 mg-b-120 height-mensajes-bo">
    <div class="container">
        <div class="row">
            <div class="col-12 mg-b-120 mb-lg-5">
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="visita" role="tabpanel" aria-labelledby="visita-tab">
                        <h5 class="mensajesbo">Mensajes</h5>
                        <table id="mensajes-back" class="table display  table-responsive" style="width: 100%;">
                            <thead>
                                <tr>
                                    <th>Usuario</th>
                                    <th>Status</th>
                                    <th>Fecha</th>
                                </tr>
                            </thead>
                            <tbody>
                                
                            </tbody>
                        </table>
                    </div>

                    
                </div>
            </div>
        </div>
    </div>
</section>