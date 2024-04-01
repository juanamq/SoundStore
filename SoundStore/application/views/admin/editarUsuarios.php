<?php
$dataHeader['titulo'] = "Editar Usuario";
$this->load->view('layouts/header', $dataHeader);
?>
<?php
$dataSidebar['session'] = $session;
$dataSidebar['optionSelected'] = 'openEditUsers';
$this->load->view('layouts/sidebar', $dataSidebar);
?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <div class="col-12 m-0 p-3">
        <h1 class="text-primary text-center">Editar Usuario</h1>
        <form action="<?= base_url('tuControlador/actualizarUsuario/' . $usuario->id_usuario) ?>" method="POST">
            <!-- Aquí debes agregar los campos del formulario para editar el usuario -->
            <div class="form-group">
                <label for="nombres">Nombres:</label>
                <input type="text" name="nombres" id="nombres" value="<?= $usuario->nombres ?>" class="form-control">
            </div>
            <div class="form-group">
                <label for="apellidos">Apellidos:</label>
                <input type="text" name="apellidos" id="apellidos" value="<?= $usuario->apellidos ?>" class="form-control">
            </div>
            <div class="form-group">
                <label for="telefono">Teléfono:</label>
                <input type="text" name="telefono" id="telefono" value="<?= $usuario->telefono ?>" class="form-control">
            </div>
            <div class="form-group">
                <label for="direccion">Dirección:</label>
                <input type="text" name="direccion" id="direccion" value="<?= $usuario->direccion ?>" class="form-control">
            </div>
            <div class="form-group">
                <label for="email">Correo:</label>
                <input type="email" name="email" id="email" value="<?= $usuario->email ?>" class="form-control">
            </div>
            <!-- Otros campos del formulario si es necesario -->
            <button type="submit" class="btn btn-primary">Guardar Cambios</button>
        </form>
    </div>
</div>
<?php
$this->load->view('layouts/footer');
?>
