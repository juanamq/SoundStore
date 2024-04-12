<?php 
    $dataHeader['titulo'] = "Instrumentos";
    $dataHead['encabezado'] = "LISTADO INSTRUMENTOS";
    $this->load->view('layouts/header', $dataHead, $dataHeader); 
?>


<div>
    <div class="container-btn-table">
        <a href="<?php echo base_url('index.php/admin/Instrumento/openCreateInstrumentos'); ?>" class="btn-registrar">Registrar</a>
    </div>
    <table class="table_instrumentos">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Marca</th>
                <th>Stock</th>
                <th>Color</th>
                <th>Foto</th>
                <th>Modelo</th>
                <th>Precio</th>
                <th>Estado</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
        <?php foreach ($instrumentos as $instrumento) : ?>
            <?php if ($instrumento->estado == 'ACTIVO') : ?>
                <tr>
                    <td><?php echo $instrumento->id_instrumento; ?></td>
                    <td><?php echo $instrumento->nombre; ?></td>
                    <td><?php echo $instrumento->marca; ?></td>
                    <td><?php echo $instrumento->stock; ?></td>
                    <td><?php echo $instrumento->color; ?></td>
                    <td><img src="<?php echo base_url();?><?php echo "/dist/img/".$instrumento->foto?>" alt="Foto del producto" class="img-circle img-fluid" style="max-width: 100px; max-height: 100px;"></td>                  
                    <td><?php echo $instrumento->modelo; ?></td>
                    <td><?php echo $instrumento->precio; ?></td>
                    <td><?php echo $instrumento->estado; ?></td>
                    <td>
                        <a class="boton_editar_user" href="<?php echo site_url('admin/Instrumento/openEditInstrumentos/' . $instrumento->id_instrumento); ?>">Editar</a>
                        
                        <?php if ($instrumento->estado == 'ACTIVO') : ?>
                            <a class="boton_eliminar_user" href="<?php echo site_url('admin/Instrumento/deleteInstrumento/' . $instrumento->id_instrumento); ?>">Desactivar</a>
                            <br>
                        <?php else : ?>
                            <a class="boton_activar_user" href="<?php echo site_url('admin/Instrumento/activateInstrumento/' . $instrumento->id_instrumento); ?>">Activar</a>
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
