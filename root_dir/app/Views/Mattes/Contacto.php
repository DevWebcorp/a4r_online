<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/toastify-js"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">
<script src="https://momentjs.com/downloads/moment-with-locales.min.js"></script>

<link href="<?= base_url() ?>../../../assets/lib/SpinKit/spinkit.css" rel="stylesheet">

<section class="propiedades mg-t-120" style="margin-bottom:320px;">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h3 class="contacto text-center">Ayúdanos a ayudarte. Si tienes alguna duda contáctanos </h5>
            </div>
        </div>
    </div>
    <div class="container-fluid mt-5">
        <div class="row">
            <div class="col-lg-6 ml-auto">
                <form id="contato" enctype="multipart/form-data">
                    <div class="row justify-content-center mg-t-40">
                        <div class="col-lg-12 form__group">
                            <input id="nombre" type="text" class="form__input" placeholder=" " required name="nombre" pattern="[a-zA-ZñÑáéíóúÁÉÍÓÚ\s]+" minlength="3" maxlength="25">
                            <label class="form__label">Nombre<span class="tx-danger">*</span></label>
                            <div class="requirements">
                                Tiene que tener mínimo 3 caracteres
                            </div>
                        </div>
                    </div>

                   <!--  <div class="row justify-content-center mg-t-40">
                        <div class="col-lg-12 form__group">
                            <input id="universidad" type="text" class="form__input" placeholder=" " required name="universidad" pattern="[a-zA-ZñÑáéíóúÁÉÍÓÚ\s]+" minlength="3" maxlength="25">
                            <label class="form__label">Universidad<span class="tx-danger">*</span></label>
                            <div class="requirements">
                                Tiene que tener mínimo 3 caracteres
                            </div>
                        </div>
                    </div> -->

                    <div class="row justify-content-center mg-t-40">
                        <div class="col-lg-12 form__group">
                            <input id="correo" type="email" class="form__input" placeholder=" " required name="correo" >
                            <label class="form__label">Correo electrónico<span class="tx-danger">*</span></label>
                            <div class="requirements">
                                Tiene que tener mínimo 3 caracteres
                            </div>
                        </div>
                    </div>

                    <div class="row justify-content-center mg-t-40">
                        <div class="col-lg-12 form__group">
                            <input id="datos" type="text" class="form__input" placeholder=" " required name="datos" pattern="[a-zA-ZñÑáéíóúÁÉÍÓÚ\s]+" minlength="10" maxlength="100">
                            <label class="form__label">¿En qué te podemos ayudar?<span class="tx-danger">*</span></label>
                            <div class="requirements">
                                Tiene que tener mínimo 3 caracteres
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-12 row mx-auto px-0 px-lg-2 mt-3">
                        <div class="col-sm-12 text-center text-md-right px-0">
                            <div class="d-flex flex-column flex-sm-row justify-content-end">
                                <button class="btn btn-teal px-4 py-2" type="submit">Enviar</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>

            <div class="col-lg-4 row text-center ml-auto mr-auto mg-sm-30">
                <div class="col-lg-12 row align-items-center">
                    <h1 style="font-family: 'Gothicb';">...también nos puedes mandar un whatsapp y resolveremos tus dudas</h1>
                </div>
                <div class="col-lg-12 text-center">
                    <a  href="https://wa.me/527224288001"><img title="Contáctanos" class="img-redes" src="<?= base_url() ?>/assets/img/about/whatsapp.png"></a>
                </div>
            </div>
        </div>

        <div class="row mg-t-40">
            <div class="col-lg-12 col-sm-12 text-center">
                <a  href="https://www.facebook.com/MattesMexico"><img title="Contáctanos" class="img-redes mr-lg-5 ml-lg-5 mr-2 ml-2" src="<?= base_url() ?>/assets/img/about/facebook-actual.png"></a>
                <a  href="https://www.instagram.com/mattes_mx/"><img title="Contáctanos" class="img-redes mr-lg-5 ml-lg-5 mr-2 ml-2" src="<?= base_url() ?>/assets/img/about/insta-1.png"></a>
                <a  href="https://twitter.com/mattes_mx"><img title="Contáctanos" class="img-redes mr-lg-5 ml-lg-5 mr-2 ml-2" src="<?= base_url() ?>/assets/img/about/logo-tw.png"></a>
            </div>
            <!-- <div class="col-4 col-lg-12 text-center">
                <a  href="https://www.facebook.com/MattesMexico"><img title="Contáctanos" class="img-redes" src="<?= base_url() ?>/assets/img/about/facebook-actual.png"></a>
            </div>
            <div class="col-4 col-lg-12 text-center">
                <a  href="https://www.instagram.com/mattes_mx/"><img title="Contáctanos" class="img-redes" src="<?= base_url() ?>/assets/img/about/insta-1.png"></a>
            </div>
            <div class="col-4 col-lg-12 text-center">
                <a  href="https://twitter.com/mattes_mx"><img title="Contáctanos" class="img-redes" src="<?= base_url() ?>/assets/img/about/logo-tw.png"></a>
            </div> -->
        </div>
    </div>
</section>

<script>
     $(document).on('submit', '#contato', function() {
        //document.getElementById("Bancarios").click();

        //Obtenemos datos formulario.
        //var form = $("#form-personales");
        var formData = new FormData($(this)[0]);
        //document.getElementById("d_bancarios").click();
        const url = `${BASE_URL}Mattes/Api/General/Contacto/sendMail`;

        //AJAX.
        $.ajax({
            url: url,
            type: 'POST',
            data: formData,
            dataType: 'json',
            success: function(data) {
                if (data.status == 200) {
                    Toastify({
                        text: data.messages.success,
                        duration: 3000,
                        className: "info",
                        // avatar: "../../assets/img/logop.png",
                        style: {
                            background: "linear-gradient(to right, #00b09b, #96c93d)",
                        },
                        offset: {
                            x: 50, // horizontal axis - can be a number or a string indicating unity. eg: '2em'
                            y: 90 // vertical axis - can be a number or a string indicating unity. eg: '2em'
                        },

                    }).showToast();

                    //$('#d_fiscales').attr('disabled', true);
                    document.getElementById("notificaciones").click();

                } else {
                    Toastify({
                        text: data.messages.success,
                        duration: 3000,
                        className: "info",
                        // avatar: "../../assets/img/logop.png",
                        style: {
                            background: "linear-gradient(to right, #00b09b, #96c93d)",
                        },
                        offset: {
                            x: 50, // horizontal axis - can be a number or a string indicating unity. eg: '2em'
                            y: 90 // vertical axis - can be a number or a string indicating unity. eg: '2em'
                        },

                    }).showToast();
                }

            },
            cache: false,
            contentType: false,
            processData: false
        });
        return false;
    });
</script>