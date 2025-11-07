<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Twitter -->
    <meta name="twitter:site" content="@themepixels">
    <meta name="twitter:creator" content="@themepixels">
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="Starlight">
    <meta name="twitter:description" content="Premium Quality and Responsive UI for Dashboard.">
    <meta name="twitter:image" content="http://themepixels.me/starlight/img/starlight-social.png">

    <!-- Facebook -->
    <meta property="og:url" content="http://themepixels.me/starlight">
    <meta property="og:title" content="Starlight">
    <meta property="og:description" content="Premium Quality and Responsive UI for Dashboard.">

    <meta property="og:image" content="http://themepixels.me/starlight/img/starlight-social.png">
    <meta property="og:image:secure_url" content="http://themepixels.me/starlight/img/starlight-social.png">
    <meta property="og:image:type" content="image/png">
    <meta property="og:image:width" content="1200">
    <meta property="og:image:height" content="600">

    <!-- Meta -->
    <meta name="description" content="Premium Quality and Responsive UI for Dashboard.">
    <meta name="author" content="ThemePixels">

    <title><?=$title?></title>

    <!-- vendor css -->
    <link href="<?=base_url()?>/../../assets/lib/font-awesome/css/font-awesome.css" rel="stylesheet">
    <link href="<?=base_url()?>/../../assets/lib/Ionicons/css/ionicons.css" rel="stylesheet">
    <link href="<?=base_url()?>/../../assets/lib/select2/css/select2.min.css" rel="stylesheet">


    <!-- Starlight CSS -->
    <link rel="stylesheet" href="<?=base_url()?>/../../assets/css/starlight.css">
  </head>

  <body>

    <div class="d-flex align-items-center justify-content-center bg-sl-primary ht-md-100v">
      <div class="login-wrapper wd-400 wd-xs-500 pd-25 pd-xs-40 bg-white">
        <img src="<?=base_url()?>/../../assets/img/logo_b.png" height="100%" width="100%">
        <div class="signin-logo tx-center tx-24 tx-bold tx-inverse">REGISTRO <span class="tx-info tx-normal">PACIENTE</span></div>
        <div class="tx-center mg-b-60">Tu historia clínica en un solo lugar.</div>
        <?php 
        if(isset($error)){
            echo '<div class="alert alert-danger" role="alert">
            <div class="d-flex align-items-center justify-content-start">
              <i class="icon ion-ios-checkmark alert-icon tx-32 mg-t-5 mg-xs-t-0"></i>
              <span><strong>Ha ocurrido un error! <br></strong>'.$error.'</span>
            </div><!-- d-flex -->
          </div><!-- alert -->';
        }
        ?>
        <form method="POST" action="<?=base_url()?>/registro_paciente/register">
            <div class="form-group">
                <input type="text" class="form-control" name="name" placeholder="Ingresa tu nombre" required <?php if( isset($username) ){echo 'value="'.$username.'"';} ?> >
            </div><!-- form-group -->

            <div class="form-group">
                <input type="email" class="form-control" name="email" placeholder="Ingresa tu correo electrónico" required <?php if( isset($email) ){echo 'value="'.$email.'"';} ?> >
            </div><!-- form-group -->

            <div class="form-group">
                <input type="tel" class="form-control" name="tel" placeholder="Ingresa tu teléfono" required <?php if( isset($username) ){echo 'value="'.$tel.'"';} ?> >
            </div><!-- form-group -->

            <div class="form-group">
                <input type="password" class="form-control" name="password" placeholder="Ingresa tu contraseña" required>
            </div><!-- form-group -->

            <div class="form-group">
                <input type="password" class="form-control" name="confirm_password" placeholder="Repite la contraseña" required >
            </div><!-- form-group -->
            <div class="form-group tx-12">Al presionar el botón "Registrar" usted acepta nuestra <a href="https://redmedicasegura.com/terminos-y-condiciones/" target="_blank">política de privacidad y nuestros términos y condiciones.</a></div>
            <button type="submit" class="btn btn-info btn-block">Registrar</button>
        </form>

        <div class="mg-t-40 tx-center">¿Ya tienes una cuenta? <a href="<?=base_url()?>" class="tx-info">Iniciar sesión</a></div>
      </div><!-- login-wrapper -->
    </div><!-- d-flex -->

    <script src="<?=base_url()?>/../../assets/lib/jquery/jquery.js"></script>
    <script src="<?=base_url()?>/../../assets/lib/popper.js/popper.js"></script>
    <script src="<?=base_url()?>/../../assets/lib/bootstrap/bootstrap.js"></script>
    <script src="<?=base_url()?>/../../assets/lib/select2/js/select2.min.js"></script>
  </body>
</html>
