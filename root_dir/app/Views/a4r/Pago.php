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
        <div class="awe-overlay"></div>
        <div class="sub-banner">
            <div class="container">
                <div class="text text-center">
                    <h2>Seccion de pago</h2>
                    <p>Lorem Ipsum is simply dummy text</p>
                </div>
            </div>
        </div>
    </section>
    <!-- END / SUB BANNER -->

    <!-- BLOG -->
    <section class="section-checkout">
        <div class="container">
            <div class="checkout">

                <p class="checkout_login">
                    ¿Ya eres cliente? 
                    <a href="#">Haz clic aquí para iniciar sesión.</a>
                </p>

                <div class="row">

                    <div class="col-md-6">
                        <div class="checkout_head">
                            <h3>Datos de facturación</h3>
                            <span>Completa la siguiente información</span>
                        </div>

                        <div class="checkout_form">

                            <div class="row">

                                <div class="col-xs-12 col-sm-12">
                                    <label>País*</label>
                                    <select class="awe-select">
                                        <option>United Kingdom (Uk)</option>
                                        <option>VietNam</option>
                                        <option>ThaiLan</option>
                                        <option>China</option>
                                    </select>
                                </div>

                                <div class="col-xs-6 col-sm-6">
                                    <label>Nombre(s)*</label>
                                    <input type="text" class="field-text">
                                </div>

                                <div class="col-xs-6 col-sm-6">
                                    <label>Apellidos*</label>
                                    <input type="text" class="field-text">
                                </div>

                                <div class="col-xs-12 col-sm-12">
                                    <label>Dirección*</label>
                                    <input type="text" class="field-text" placeholder="">
                                </div>

                                <div class="col-xs-6 col-sm-6">
                                    <label>Ciudad*</label>
                                    <input type="text" class="field-text">
                                </div>

                                <div class="col-xs-6 col-sm-6">
                                    <label>Alcaldia/ Municipio*</label>
                                    <input type="text" class="field-text">
                                </div>

                                <div class="col-xs-6 col-sm-6">
                                    <label>Correo electrónico*</label>
                                    <input type="text" class="field-text">
                                </div>

                                <div class="col-xs-6 col-sm-6">
                                    <label>Teléfono*</label>
                                    <input type="text" class="field-text">
                                </div>

                                <div class="col-xs-12 col-sm-12">
                                    <label>
                                        <input type="radio" class="field-radio"> Crear una cuenta
                                    </label>

                                    <p class="checkout_text">Crea una cuenta ingresando la información a continuación. Si ya eres cliente, inicia sesión en la parte superior de la página..</p>
                                </div>

                                <div class="col-xs-12 col-sm-12">
                                    <label>Contraseña*</label>
                                    <input type="password" class="field-text">
                                </div>

                                <div class="col-xs-12 col-sm-12">
                                    <label>&nbsp;</label>
                                    <p class="code-enter">
                                        ¿Tienes un cupón? <a href="#">Haz clic aquí para introducir tu código.</a>
                                    </p>
                                </div>

                            </div>

                        </div>
                    </div> 

                    <div class="col-md-6">

                        <div class="checkout_head checkout_margin">
                            <h3>Sus datos de pago</h3>
                        </div>

                        <div class="checkout_form checkout_margin">
                        
                            <div class="checkout_cart">

                                <!-- ITEM -->
                                <div class="cart-item">
                                    <div class="img">
                                        <a href="#">
                                            <img src="<?= base_url('templates/7 The lotus hotel/landing.engotheme.com/html/lotus/demo/images/cart/img-2.jpg') ?>">
                                        </a>
                                    </div>
                                    <div class="text">
                                        <a href="#">Habitación de lujo</a>
                                        <p><span>2 días  - 3 recámaras</span> <b>$960</b></p>
                                    </div>
                                    <a href="#" class="remove"><i class="fa fa-close"></i></a>
                                </div>
                                <!-- END / ITEM -->

                            </div>

                            <div class="checkout_cartinfo">
                                <p><span>Subtotal:</span> $1080</p>
                                <p><span>Total:</span> <span class="color-red">$1080</span></p>
                            </div> 
                            
                            <div class="checkout_option">
                                <ul>
                                    <li>
                                        <input type="radio" class="radio payment-methor" name="payment">
                                        <h6>Transferencia bancaria directa</h6>
                                        <p>Realice su pago directamente en nuestra cuenta bancaria. Utilice su número de pedido como referencia de pago. Su pedido no se enviará hasta que los fondos se hayan acreditado en nuestra cuenta.</p>
                                    </li>
                                    <li>
                                        <input type="radio" class="radio payment-methor" name="payment"> 
                                        <h6>Tarjeta de crédito</h6>
                                        <img src="images/icon-card.jpg" alt="">
                                    </li>
                                </ul>
                            </div>

                            <div class="checkout_btn">
                                <button class="awe-btn awe-btn-13 btn-order">Pagar</button>
                            </div>
                        </div>

                    </div>

                </div>
            </div>
        </div>
    </section>
    <!-- END / BLOG -->

<!--HTML-->


<?= $this->endSection() ?>

<?= $this->section('scripts') ?>
    <script>
        // Aquí van los scripts específicos de esta página
    </script>
<?= $this->endSection() ?>
