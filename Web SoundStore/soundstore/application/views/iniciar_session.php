<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="<?php echo base_url('dist/css/style.css'); ?>">
</head>
<body>
    <div class="container">
        <div class="header">
            <img src="<?php echo base_url('dist/img/logo_soundstore.png'); ?>" alt="Logo SoundStore">
        </div>
        <div class="box">
            <form action="<?= base_url('index.php/Login/validarIngreso') ?>" method="POST">
                <div class="form-group">
                    <label for="campo_email">Correo:</label>
                    <input class="form-control <?php echo (isset($valueEmail) && $valueEmail!='')? 'is-valid': ((isset($errorInData))? 'is-invalid':'') ?>" type="text" id="campo_email" name="campo_email" title="Correo" value="<?php echo (isset($valueEmail))? $valueEmail : '' ?>"/>
                </div>
                <div class="form-group">
                    <label for="campo_password">Contraseña:</label>
                    <input class="form-control <?php echo (isset($valueEmail) && $valuePassword!='')? 'is-valid': ((isset($errorInData))? 'is-invalid':'') ?>" id="campo_password" type="password" name="campo_password" value="<?php echo (isset($valuePassword))? $valuePassword : '' ?>">
                </div>
                <div class="form-group">
                    <a href="#" class="forgot-password">¿Olvidaste tu contraseña?</a>
                </div>
                <div class="form-group">
                    <a href="#" class="register-link">¿No te has registrado? Regístrate</a>
                </div>
                <div class="form-group">
                    <input type="submit" id="do_login" value="Ingresar" title="Ingresar" />
                </div>
            </form>
        </div>
    </div>
</body>
</html>
