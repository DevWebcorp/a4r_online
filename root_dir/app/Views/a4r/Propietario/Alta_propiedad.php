<!-- EXTENDIENDO EL LAYOUT PRINCIPAL -->
<?= $this->extend('layout/main') ?>

<!--LIBRERIAS DINAMICAS PARA CSS-->
<?= $this->section('css') ?>
<!-- Aquí puedes agregar hojas de estilo específicas para esta vista -->
<?= $this->endSection() ?>

<!-- CONTENIDO DINAMICO -->
<?= $this->section('content') ?>

<style>
    .select-formularios{
        border: 2px solid #232323;
        width: 100%;
        margin-top: 20px;
        color: #232323;
        line-height: 35px;
        height: 40px;
    }
</style>

 <!-- SUB BANNER -->
<section class="section-sub-banner bg-9">
    <div class="sub-banner">
        <div class="container">
            <div class="text text-center">
                <h2>Subir propiedad</h2><!-- 
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
                        <h2>Datos generales</h2>
                        <!-- <p>En A4r buscamos la seguridad de toda nuestra comunidad, es por esto que los documentos que pedimos a continuación son necesarios para poder subir tu propiedad en la plataforma. </p> -->
                    </div>
                </div>

                <div class="col-12">
                    <div class="contact-form">
                        <form id="form-personales" method="post" enctype="multipart/form-data">
                            <div class="container">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <input type="text" class="field-text" name="nombre_propiedad" placeholder="Nombre corto" pattern="[a-zA-ZñÑáéíóúÁÉÍÓÚ-z0-9\s]+" minlength="5" maxlength="50">
                                    </div>
                                    <div class="col-sm-6 col-lg-4">
                                        <input type="text" class="field-text" name="descripcion" placeholder="Describe tu propiedad" pattern="[a-zA-ZñÑáéíóúÁÉÍÓÚ-z0-9\s]+" minlength="5" maxlength="250" required>
                                    </div>
                                    <div class="col-sm-6 col-lg-4">
                                        <input type="date" class="field-text" name="disponibilidad" placeholder="Disponible a partir de:">
                                    </div>

                                    <div class="col-sm-6 col-lg-4">
                                        <select id="tipo-alojamiento" name="tipo_alojamiento" class="form__input select2 select-formularios" data-placeholder="Choose Browser" required>
                                            <option value="">Tipo de alojamiento </option>
                                            <option value="Si"> Casa</option>
                                            <option value="No">Habitación individual en casa</option>
                                            <option value="No">Habitación compartida en casa</option>
                                            <option value="No">Departamento</option>
                                            <option value="No">Habitación individual en departamento</option>
                                            <option value="No">Habitación compartida en departamento</option>
                                            <option value="No">Loft</option>
                                        </select>
                                    </div>                                    
                                    <div class="col-lg-12 text-right">
                                        <button type="submit" class="awe-btn awe-btn-13">Guardar</button>
                                    </div>
                                </div>
                            </div>
                            <div id="contact-content"></div>
                        </form>
                    </div>

                    <div class="text container">
                        <h2>Localización</h2>
                    </div>

                    <div class="contact-form">
                        <form id="form-personales" method="post" enctype="multipart/form-data">
                            <div class="container">
                                <div class="row">
                                    <div class="col-sm-6 col-lg-3">
                                        <input type="text" class="field-text" name="direccion" placeholder="Dirección [calle, número]" required>
                                    </div>
                                    <div class="col-lg-3">
                                        <input type="text" class="field-text" name="ZIP_CODE" placeholder="Código postal" required>
                                    </div>                                    
                                    <div class="col-sm-6 col-lg-3">
                                        <input type="text" class="field-text" name="delegacion" placeholder="Delegación o municipio">
                                    </div>
                                    <div class="col-sm-6 col-lg-3">
                                        <input type="text" class="field-text" name="estado" placeholder="Estado">
                                    </div>                         
                                    <div class="col-sm-6 col-lg-4">
                                        <input type="text" class="field-text" name="colonia" placeholder="Precio">
                                    </div>
                                    <div class="col-lg-12 text-right">
                                        <button type="submit" class="awe-btn awe-btn-13">Guardar</button>
                                    </div>
                                </div>
                            </div>
                            <div id="contact-content"></div>
                        </form>
                    </div>

                    <div class="text container">
                        <h2>Servicios</h2>
                    </div>

                    <div class="contact-form">
                        <form id="form-personales" method="post" enctype="multipart/form-data">
                            <div class="container">
                                <div class="row">
                                    <div class="col-sm-6 col-lg-3">
                                        <input type="number" class="field-text" name="upd_numero_roomies" placeholder="Número de roomies" pattern="^[0-9]+" min="0" max="10" required>
                                    </div>
                                    <div class="col-lg-3">
                                        <input type="number" class="field-text" name="id_propiedad" placeholder="Número de camas" pattern="^[0-9]+" min="0" max="10" required>
                                    </div>                                    
                                    <div class="col-sm-6 col-lg-3">
                                        <input type="number" class="field-text" name="delegacion" placeholder="Número de baños" pattern="^[0-9]+" min="0" max="10">
                                    </div>
                                    <div class="col-sm-6 col-lg-3">
                                        <select id="tipo_bano" name="upd_status_bano" class="field-text select-formularios" data-placeholder="Choose Browser" required>
                                            <option value="">Baño</option>
                                            <option value="Compartido">Compartido</option>
                                            <option value="Privado">Privado</option>
                                        </select>
                                    </div>                         
                                    <div class="col-sm-6 col-lg-3">
                                        <select id="tipo_bano" name="upd_status_bano" class="field-text select-formularios" data-placeholder="Choose Browser" required>
                                            <option value="">Petfriendly</option>
                                            <option value="Compartido">Si</option>
                                            <option value="Privado">No</option>
                                        </select>
                                    </div>  
                                    <div class="col-sm-6 col-lg-3">
                                        <select id="tipo_bano" name="upd_status_bano" class="field-text select-formularios" data-placeholder="Choose Browser" required>
                                            <option value="">Disponible para:</option>
                                            <option value="Compartido">Mujeres</option>
                                            <option value="Privado">Hombres</option>
                                            <option value="Privado">Mixto</option>
                                        </select>
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
