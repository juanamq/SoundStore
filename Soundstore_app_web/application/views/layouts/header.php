<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= (isset($titulo)? $titulo : "SoundStore")?></title>
    
    <link rel="stylesheet" href="<?php echo base_url('dist/css/menu.css'); ?>">
</head>
<body>
    <div class="container">
        <div class="header">
            <div class="logo">
                <a href="<?= base_url('index.php/admin/inicio') ?>"><img src="<?php echo base_url('dist/img/logo_soundstore.png'); ?>" alt=""></a>
            </div>
            <h1><?= (isset($encabezado)? $encabezado : "Inicio")?></h1>
            <div class="nav-item">
                <a href="<?= base_url('index.php/Login/cerrarSession') ?>" class="nav-link">
                    <button>Cerrar Sesion</button>
                </a>
            </div>
        </div>