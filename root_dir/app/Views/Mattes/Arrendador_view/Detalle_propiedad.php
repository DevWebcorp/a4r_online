<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/toastify-js"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">

<div class="alert bg-warning mg-t-100 d-none" id="alert_correo" role="alert">
    <button type="button" class="close" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
    <div class="d-flex align-items-center justify-content-start">
        <i class="fa fa-exclamation-triangle alert-icon tx-32 mg-t-5 mg-xs-t-0"></i>
        <span><strong>SU CORREO ELECTRÓNICO NO HA SIDO VERIFICADO, POR FAVOR VERIFIQUE SU BANDEJA DE ENTRADA</strong> <span id="success"></span></span>
    </div><!-- d-flex -->
</div><!-- alert -->

<div class="container form-border mg-t-70 mg-b-170">
    <div class="row" style="margin-top: 135px;">
        <div class="col-12 mg-t-10">
            <div class="tab generales d-flex flex-column flex-lg-row justify-content-center">
                <button class="tablinks active mb-1 mr-lg-1"><i class="fa fa-address-card-o mr-2" aria-hidden="true"></i>Generales</button>
                <button class="tablinks faltante mb-1 mr-lg-1"><i class="fa fa-map-marker mr-2" aria-hidden="true"></i>Localización</button>
                <button class="tablinks faltante mb-1 mr-lg-1"><i class="fa fa-bath mr-2" aria-hidden="true"></i>Servicios</button>
                <button class="tablinks faltante mb-1 "><i class="fa fa-file-text-o mr-2" aria-hidden="true"></i>Documentos</button>
            </div>

            <div class="text-center">
                <h1 class="detalle-prop mb-5">Detalle de propiedad</h1>
            </div>
            <form class="mb-5" id="detalle-propiedad" enctype="multipart/form-data">
                <div class="row mg-t-20 px-3">
                    <div class="col-lg-7 form__group">
                        <!--pattern="[a-zA-ZñÑáéíóúÁÉÍÓÚ-z0-9\s]+" -->
                        <input type="text" class="form__input" id="nombre-propiedad" name="nombre_propiedad" minlength="5" maxlength="50" autocomplete="off" placeholder=" " required>
                        <label class="form__label">Nombre corto <span class="text-danger">*</span></label>
                        <div class="requirements">
                            Tiene que tener mínimo 5 caracteres
                        </div>
                    </div>
                </div>
                <div class="row mg-t-40 px-3">
                    <div class="col-lg-7 form__group">
                        <textarea class="form__input" id="validationTextarea" name="descripcion" pattern="[a-zA-ZñÑáéíóúÁÉÍÓÚ-z0-9\s]+" minlength="5" maxlength="250" autocomplete="off" placeholder=" " required></textarea>
                        <label class="form__label">Describe tu propiedad<span class="text-danger">*</span></label>
                        <div class="requirements">
                            Tiene que tener mínimo 5 caracteres
                        </div>
                    </div>
                </div>
                <!-- <div class="row mg-t-40 px-3">
                        <div class="col-lg-7 form__group">
                            <input type="text" id="horario-visita" name="horario_visita" class="form__input"
                            placeholder=" " pattern="^[A-Za-z0-9\:\s\/-]+" minlength="5" maxlength="250"
                            title="Solo se permiten números" required>
                            <label class="form__label">Horario de visita<span class="text-danger">*</span></label>
                            <div class="requirements">
                                Tiene que tener mínimo 5 caracteres
                            </div>
                        </div>
                    </div> -->
                <div class="row mg-t-40 px-3">
                    <div class="col-lg-7 form__group">
                        <input type="date" id="disponibilidad" name="disponibilidad" class="form__input" placeholder=" " required>
                        <label class="form__label">Disponible a partir de: <span class="text-danger">*</span></label>
                    </div>
                </div>
                <div class="row mg-t-40 px-3">
                    <div class="col-lg-7 form__group">
                        <select id="tipo-alojamiento" name="tipo_alojamiento" class="form__input select2" data-placeholder="Choose Browser" required>
                            <div class="valid-feedback">Valido.</div>
                            <div class="invalid-feedback">SELECCIONA VALOR VALIDO</div>
                        </select>
                        <label class="form__label">Tipo de alojamiento<span class="text-danger">*</span></label>
                    </div>
                </div>

                <div class="col-lg-7 row mx-auto px-0 text-md-right mt-5">
                    <div class="col-sm-12 text-center text-md-right pl-lg-0">
                        <div class="d-flex flex-column flex-sm-row justify-content-end">
                            <button class="btn-danger mr-sm-2 mb-2 mb-sm-0 px-4 py-1" id="btncontinuar_detalles" name="continuar-detalles">
                                <a href="<?= base_url() ?>/Mattes/Arrendador/Index" class="text-white" style="text-decoration: none;">
                                    <i class="fa fa-sign-out fa-lg mr-1" aria-hidden="true"></i>Salir sin guardar
                                </a>
                            </button>
                            <button type="submit" class="btn-primary px-4 py-1" id="btnsiguiente_detalles" name="siguiente_detalles"><i class="fa fa-floppy-o fa-lg mr-1" aria-hidden="true"></i><span style="font-size:18px;">Guardar</span>
                            </button>
                        </div>
                    </div>
                </div>
            </form>


        </div>
    </div> <!-- div row fin -->
</div> <!-- div container fin -->

<form method="POST" id="ubicacion" action="<?php echo base_url() ?>/propiedad-ubicacion">
    <input type="hidden" name="id" id="id">
</form>

<script>
    //Fecha posterior de entrada
     var fecha = new Date();
    fecha.setDate(fecha.getDate() + 1);
    var dia = ("0" + fecha.getDate()).slice(-2);
    var mes = ("0" + (fecha.getMonth() + 1)).slice(-2);
    var hoyMasUnDia = fecha.getFullYear()+"-"+(mes)+"-"+(dia) ;

    document.getElementById("disponibilidad").setAttribute("min", hoyMasUnDia);
    let id_goup = <?php echo json_encode($grupo); ?>;
</script>