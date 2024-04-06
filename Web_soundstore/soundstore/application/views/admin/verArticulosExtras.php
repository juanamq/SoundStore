<?php 
    $dataHeader['titulo'] = "Articulos_extras";
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
                <th>Color</th>
                <th>Modelo</th>
                <th>Precio</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($articulos_extras as $articulo_extra) : ?>
                <tr>
                    <td><?php echo $articulo_extra->id_articulo; ?></td>
                    <td><?php echo $articulo_extra->nombre; ?></td>
                    <td><?php echo $articulo_extra->marca; ?></td>
                    <td><?php echo $articulo_extra->stock; ?></td>
                    <td><?php echo $articulo_extra->color; ?></td>
                    <td><?php echo $articulo_extra->modelo; ?></td>
                    <td><?php echo $articulo_extra->precio; ?></td>
                    <td>
                    <a class="boton_editar_user" href="<?php echo site_url('admin/Articulo_extra/openEditArticulos/' . $articulo_extra->id_articulo); ?>">Editar</a>
                        
                        <a class="boton_eliminar_user" href="<?php echo site_url('admin/Articulo_extra/deleteArticulos/' . $articulo_extra->id_articulo); ?>">Borrar</a>
                    </td>
                </tr>
            <?php endforeach ?>
        </tbody>
    </table>
</div>
<?php 
    $this->load->view('layouts/footer'); 
?>
