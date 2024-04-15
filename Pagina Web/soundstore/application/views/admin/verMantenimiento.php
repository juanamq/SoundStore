<?php 
    $dataHeader['titulo'] = "Mantenimiento";
    $dataHead['encabezado'] = "LISTA MANTENIMIENTOS";
    $this->load->view('layouts/header', $dataHead, $dataHeader); 
?>


<div>
    <table class="table_instrumentos">
        <thead>
            <tr>
                <th>ID</th>
                <th>id_usuario</th>
                <th>tipo_instrumento</th>
                <th>marca</th>
                <th>modelo</th>
                <th>tiempo</th>
                <th>fecha</th>
                <th>estado</th>
                <th>Opciones</th>
            </tr>
        </thead>
        <tbody>
        <?php foreach ($mantenimientos as $mantenimiento) : ?>
            <?php if ($mantenimiento->estado_mante == 'ACTIVO') : ?>
                <tr>
                    <td><?php echo $mantenimiento->id_mantenimiento; ?></td>
                    <td><?php echo $mantenimiento->id_usuario; ?></td>
                    <td><?php echo $mantenimiento->tipo_instrumento; ?></td>
                    <td><?php echo $mantenimiento->marca; ?></td>
                    <td><?php echo $mantenimiento->modelo; ?></td>
                    <td><?php echo $mantenimiento->tiempo; ?></td>
                    <td><?php echo $mantenimiento->fecha; ?></td>
                    <td><?php echo $mantenimiento->estado; ?></td>
                    <td>
                        <a class="boton_editar_user" href="<?php echo site_url('admin/Mantenimiento/openEditMantenimientos/' . $mantenimiento->id_mantenimiento); ?>">Editar</a>
                        
                        <?php if ($mantenimiento->estado_mante == 'ACTIVO') : ?>
                            <a class="boton_eliminar_user" href="<?php echo site_url('admin/Mantenimiento/deleteMantenimiento/' . $mantenimiento->id_mantenimiento); ?>">Desactivar</a>
                            <br>
                        <?php else : ?>
                            <a class="boton_activar_user" href="<?php echo site_url('admin/Mantenimiento/activateInstrumento/' . $mantenimiento->id_mantenimiento); ?>">Activar</a>
                        <?php endif; ?>
                    </td>
                </tr>
            <?php endif; ?>
        <?php endforeach ?>

        </tbody>
    </table>
</div>
<?php 
    $this->load->view('layouts/footer'); 
?>
