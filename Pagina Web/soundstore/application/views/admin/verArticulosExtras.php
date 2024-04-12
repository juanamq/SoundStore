<?php 
    $dataHeader['titulo'] = "Articulos extras";
    $dataHead['encabezado'] = "Articulos extras";
    $this->load->view('layouts/header', $dataHead, $dataHeader); 
?>


<div>
    
    <div class="container-btn-table">
        <a href="<?php echo base_url('index.php/admin/Articulo_extra/openCreateArticulos'); ?>" class="btn-registrar">Registrar</a>
    </div>
    <table class="table_aticulos_extras">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Marca</th>
                <th>Stock</th>
                <th>Foto</th>
                <th>Color</th>
                <th>Modelo</th>
                <th>Precio</th>
                <th>Estado</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
        <?php foreach ($articulos_extras as $articulo_extra) : ?>
            <?php if ($articulo_extra->estado == 'ACTIVO') : ?>
                <tr>
                    <td><?php echo $articulo_extra->id_articulo; ?></td>
                    <td><?php echo $articulo_extra->nombre; ?></td>
                    <td><?php echo $articulo_extra->marca; ?></td>
                    <td><?php echo $articulo_extra->stock; ?></td>
                    <td><img src="<?php echo base_url();?><?php echo "/dist/img/".$articulo_extra->foto?>" alt="Foto del producto" class="img-circle img-fluid" style="max-width: 100px; max-height: 100px;"></td> <!-- Establece el ancho y alto máximo de la imagen -->
                    <td><?php echo $articulo_extra->color; ?></td>
                    <td><?php echo $articulo_extra->modelo; ?></td>
                    <td><?php echo $articulo_extra->precio; ?></td>
                    <td><?php echo $articulo_extra->estado; ?></td>
                    <td>
                        <a class="boton_editar_user" href="<?php echo site_url('admin/Articulo_extra/openEditArticulos/' . $articulo_extra->id_articulo); ?>">Editar</a>
                            
                        <?php if ($articulo_extra->estado == 'ACTIVO') : ?>
                            <a class="boton_eliminar_user" href="<?php echo site_url('admin/Articulo_extra/deleteArticulos/' . $articulo_extra->id_articulo); ?>">Desactivar</a>
                        <?php else : ?>
                            <a class="boton_activar_user" href="<?php echo site_url('admin/Articulo_extra/activateArticulos/' . $articulo_extra->id_articulo); ?>">Activar</a>
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
