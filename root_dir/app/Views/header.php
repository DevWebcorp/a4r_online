<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Twitter -->
    <meta name="twitter:site" content="@mattes_mx">
    <meta name="twitter:creator" content="@mattes_mx">
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="Mattes">
    <meta name="twitter:description" content="No te compliques, vive cerca de tu universidad.">
    <meta name="twitter:image" content="<?=base_url()?>/assets/img/card.jpeg">

    <!-- Facebook -->
    <meta property="og:url" content="https://www.facebook.com/MattesMexico">
    <meta property="og:title" content="Mattes">
    <meta property="og:description" content="No te compliques, vive cerca de tu universidad.">
    <meta property="og:image" content="<?=base_url()?>/assets/img/card.jpeg">
    <meta property="og:image:secure_url" content="<?=base_url()?>/assets/img/card.jpeg">
    <meta property="og:image:type" content="image/png">
    <meta property="og:image:width" content="1200">
    <meta property="og:image:height" content="600">

    <!-- Google tag (gtag.js) --> 
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-SVDKG63E8C"></script> 
    <script> window.dataLayer = window.dataLayer || []; function gtag(){dataLayer.push(arguments);} gtag('js', new Date()); gtag('config', 'G-SVDKG63E8C'); </script>

    <!-- Meta -->
    <meta name="description" content="<?=$description?>">
    <meta name="author" content="WebCorp">
    <title><?=$title?></title>

    <!--favicon -->
    <link rel="icon" href="<?=base_url()?>/assets/img/Mattes.png" type="image">

    <!-- vendor css -->
    <link href="<?=base_url()?>/assets/lib/font-awesome/css/font-awesome.css" rel="stylesheet">
    <link href="<?=base_url()?>/assets/lib/Ionicons/css/ionicons.css" rel="stylesheet">
    <link href="<?=base_url()?>/assets/lib/perfect-scrollbar/css/perfect-scrollbar.css" rel="stylesheet">
    <link href="<?=base_url()?>/assets/lib/rickshaw/rickshaw.min.css" rel="stylesheet">
  
    <script src="<?=base_url()?>/assets/js/general/general.js"></script>
    <?php
    foreach ($styles as $key) {
        echo "<link rel=\"stylesheet\" href=\"".base_url()."/assets/css/$key\"> \n";
    }
    ?>

  <link href="<?=base_url()?>/assets/css/Mattes/royal_preloader.min.css" rel="stylesheet">

  </head>

  

  


  

  <body class="royal_preloader">

