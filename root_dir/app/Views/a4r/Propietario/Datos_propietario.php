<!-- EXTENDIENDO EL LAYOUT PRINCIPAL -->
<?= $this->extend('layout/main') ?>

<!--LIBRERIAS DINAMICAS PARA CSS-->
<?= $this->section('css') ?>
<!-- Aquí puedes agregar hojas de estilo específicas para esta vista -->
<?= $this->endSection() ?>


<!-- CONTENIDO DINAMICO -->
<?= $this->section('content') ?>

 <!-- SUB BANNER -->
<section class="section-sub-banner bg-9">
    <div class="sub-banner">
        <div class="container">
            <div class="text text-center">
                <h2>DATOS PROPIETARIO</h2><!-- 
                <p>Lorem Ipsum is simply dummy text of the printing</p> -->
            </div>
        </div>

    </div>

</section>
<!-- END / SUB BANNER -->

<!-- CONTACT -->
<section class="section-contact">
    <div class="container">
        <div class="contact">
            <div class="row">
                <div class="col-12">
                    <div class="text container">
                        <h2>Datos del propietario</h2>
                        <!-- <p>En A4r buscamos la seguridad de toda nuestra comunidad, es por esto que los documentos que pedimos a continuación son necesarios para poder subir tu propiedad en la plataforma. </p> -->
                    </div>
                   
                </div>

                <div class="col-12">
                    <div class="contact-form">
                        <form id="send-contact-form" action="https://landing.engotheme.com/html/lotus/demo/send_mail_contact.php" method="post">
                            <div class="container">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <input type="text" class="field-text" name="foto" placeholder="Foto de perfil">
                                    </div>
                                    <div class="col-sm-6 col-lg-4">
                                        <input type="text" class="field-text"  name="name" placeholder="Nombre">
                                    </div>
                                    <div class="col-sm-6 col-lg-4">
                                        <input type="text" class="field-text"  name="name" placeholder="Apellido materno">
                                    </div>
                                    <div class="col-sm-6 col-lg-4">
                                        <input type="text" class="field-text"  name="name" placeholder="Apellido paterno">
                                    </div>
                                    <div class="col-sm-6 col-lg-4">
                                        <input type="text" class="field-text" name="email" placeholder="Correo">
                                    </div>
                                    <div class="col-sm-6 col-lg-4">
                                        <input type="text" class="field-text" name="subject" placeholder="Fecha de nacimiento">
                                    </div>
                                    <div class="col-sm-6 col-lg-4">
                                        <input type="text" class="field-text" name="subject" placeholder="Número celular">
                                    </div>
                                    <div class="col-lg-12 text-right">
                                        <button type="submit" class="awe-btn awe-btn-13">Enviar</button>
                                    </div>
                                </div>
                            </div>
                            <div id="contact-content"></div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- END / CONTACT -->

   

<!--HTML-->


<?= $this->endSection() ?>

<?= $this->section('scripts') ?>
    <script>
        // Aquí van los scripts específicos de esta página
    </script>
<?= $this->endSection() ?>
