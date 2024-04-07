<?php 
    $dataHeader['titulo'] = "Instrumentos";
    $dataHead['encabezado'] = "Instrumenos";
    $this->load->view('layouts/header', $dataHead, $dataHeader); 
?>


<div>
    <div class="container-btn-table">
        <a href="<?php echo base_url('...'); ?>" class="btn-registrar">Registrar</a>
    </div>
    <table class="table_instrumentos">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Marca</th>
                <th>Stock</th>
                <th>Color</th>
                <th>Modelo</th>
                <th>Precio</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($instrumentos as $instrumento) : ?>
                <tr>
                    <td><?php echo $instrumento->id_instrumento; ?></td>
                    <td><?php echo $instrumento->nombre; ?></td>
                    <td><?php echo $instrumento->marca; ?></td>
                    <td><?php echo $instrumento->stock; ?></td>
                    <td><?php echo $instrumento->color; ?></td>
                    <td><?php echo $instrumento->modelo; ?></td>
                    <td><?php echo $instrumento->precio; ?></td>
                    <td>
                        <a class="boton_editar_user" href="guardar_per/<?php echo $instrumento->id_instrumento; ?>">Editar</a>
                        <a class="boton_eliminar_user" href="borrar_per/<?php echo $instrumento->id_instrumento; ?>">Borrar</a>
                    </td>
                </tr>
            <?php endforeach ?>
        </tbody>
    </table>
</div>
<?php 
    $this->load->view('layouts/footer'); 
?>
