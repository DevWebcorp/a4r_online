<?php
/**
 * HEAD COMPONENT
 * Ubicación: app/Views/Layouts/Head.php
 */
?>
<head>
    <meta charset="utf-8">
    <!-- TITLE -->
    <title>Index 1</title>

    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta name="format-detection" content="telephone=no">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <link rel="shortcut icon" href="<?= base_url('templates/7 The lotus hotel/landing.engotheme.com/html/lotus/demo/images/favicon.png') ?>"/>

    <!-- GOOGLE FONT -->
    <link href="https://fonts.googleapis.com/css?family=Hind:400,300,500,600%7cMontserrat:400,700" rel='stylesheet' type='text/css'>

    <!-- CSS LIBRARY -->
    <link rel="stylesheet" type="text/css" href="<?= base_url('templates/7 The lotus hotel/landing.engotheme.com/html/lotus/demo/css/lib/font-awesome.min.css') ?>">
    <link rel="stylesheet" type="text/css" href="<?= base_url('templates/7 The lotus hotel/landing.engotheme.com/html/lotus/demo/css/lib/font-lotusicon.css') ?>">
    <link rel="stylesheet" type="text/css" href="<?= base_url('templates/7 The lotus hotel/landing.engotheme.com/html/lotus/demo/css/lib/bootstrap.min.css') ?>">
    <link rel="stylesheet" type="text/css" href="<?= base_url('templates/7 The lotus hotel/landing.engotheme.com/html/lotus/demo/css/lib/owl.carousel.css') ?>">
    <link rel="stylesheet" type="text/css" href="<?= base_url('templates/7 The lotus hotel/landing.engotheme.com/html/lotus/demo/css/lib/jquery-ui.min.css') ?>">
    <link rel="stylesheet" type="text/css" href="<?= base_url('templates/7 The lotus hotel/landing.engotheme.com/html/lotus/demo/css/lib/magnific-popup.css') ?>">
    <link rel="stylesheet" type="text/css" href="<?= base_url('templates/7 The lotus hotel/landing.engotheme.com/html/lotus/demo/css/lib/settings.css') ?>">
    <link rel="stylesheet" type="text/css" href="<?= base_url('templates/7 The lotus hotel/landing.engotheme.com/html/lotus/demo/css/lib/bootstrap-select.min.css') ?>">

    <!-- MAIN STYLE -->
    <link rel="stylesheet" type="text/css" href="<?= base_url('templates/7 The lotus hotel/landing.engotheme.com/html/lotus/demo/css/style.css') ?>">

     <!-- LIBRERÍAS DINÁMICAS POR PÁGINA -->
    <?= $this->renderSection('css') ?>

    
    <!--[if lt IE 9]>
        <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
        <script src="http://css3-mediaqueries-js.googlecode.com/svn/trunk/css3-mediaqueries.js"></script>
    <![endif]-->
</head>