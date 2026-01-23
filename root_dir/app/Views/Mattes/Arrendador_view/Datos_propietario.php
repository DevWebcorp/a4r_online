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
                                        <input type="file" class="field-text" name="file" placeholder="Foto de perfil" accept=".jpg, .png, .jpeg">
                                    </div>
                                    <div class="col-sm-6 col-lg-4">
                                        <input type="text" class="field-text" name="nombre" placeholder="Nombre" pattern="[a-zA-ZñÑáéíóúÁÉÍÓÚ\s]+" minlength="3" maxlength="25" required>
                                    </div>
                                    <div class="col-sm-6 col-lg-4">
                                        <input type="text" class="field-text" name="apellido" placeholder="Apellido materno" pattern="[a-zA-ZñÑáéíóúÁÉÍÓÚ\s]+" minlength="3" maxlength="25" required>
                                    </div>
                                    <div class="col-sm-6 col-lg-4">
                                        <input type="text" class="field-text"  name="segundo_apellido" placeholder="Apellido paterno" pattern="[a-zA-ZñÑáéíóúÁÉÍÓÚ\s]+" minlength="4" maxlength="25" >
                                    </div>
                                    <div class="col-sm-6 col-lg-4">
                                        <input type="date" class="field-text" name="f_nacimiento" placeholder="Fecha de nacimiento">
                                    </div>                                    
                                    <div class="col-sm-6 col-lg-4">
                                        <input type="number" class="field-text" name="celular" placeholder="Número celular" pattern="^[0-9]+" minlength="10" maxlength="10">
                                    </div>
                                    <div class="col-lg-12 text-right">
                                        <button type="submit" class="awe-btn awe-btn-13">Guardar</button>
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
