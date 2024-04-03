<?php 
    $dataHeader['titulo'] = "Ver Usuarios";
    $dataHead['encabezado'] = "Lista Usuarios";
    $this->load->view('layouts/header', $dataHead, $dataHeader); 
    
?>

<div class="container_users">
    <div class="cards_user">
        <?php foreach ($users->registros as $user): ?>
            <div class="card_user">
                <div class="user-info">
                    <div class="user-details">
                        <h3><?= $user->nombres ?> <?= $user->apellidos ?></h3>
                        <p><strong>Cédula:</strong> <?= $user->cedula ?></p>
                        <p><strong>Teléfono:</strong> <?= $user->telefono ?></p>
                        <p><strong>Dirección:</strong> <?= $user->direccion ?></p>
                        <p><strong>Correo:</strong> <?= $user->email ?></p>
                        <p><strong>Tipo:</strong> <?= $user->tipo ?></p>
                        <p><strong>Estado:</strong> <?= $user->estado ?></p>
                    </div>
                    <div class="user-image">
                        <img src="<?php echo base_url();?>/dist/img/avatar5.png" alt="Foto del Administrador" class="img-circle img-fluid">
                    </div>
                </div>
                <div class="actions_user">
                    <a href="<?php echo site_url('admin/inicio/editarCliente/' . $user->cedula); ?>" class="nav-link">
                        <button class="boton_editar_user">Editar</button>
                    </a>
                    <a href="<?= base_url('Inicio/openDeleteUser/'.$user->cedula) ?>" class="nav-link">
                        <button class="boton_eliminar_user">Eliminar</button>
                    </a>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>

<?php 
$this->load->view('layouts/footer'); 
?>
