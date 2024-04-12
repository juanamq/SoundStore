<?php 
    $dataHeader['titulo'] = "Historial Ventas";
    $dataHead['encabezado'] = "HISTORIAL DE VENTAS";
    $this->load->view('layouts/header', $dataHead, $dataHeader); 
?>

<div >
    <table class="table_ventas">
        <thead>
            <tr>
                <th scope="col">Id</th>
                <th scope="col">Marca</th>
                <th scope="col">Nombre</th>
                <th scope="col">Precio_unitario</th>
                <th scope="col">Cantidad</th>
                <th scope="col">Precio total</th>
                <th scope="col">Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($ventas as $venta) : ?>
                <?php if ($venta->estado == 'ACTIVO') : ?>
                    <tr>
                        <td><?php echo $venta->id_historial_compras ?></td>
                        <td><?php echo $venta->marca ?></td>
                        <td><?php echo $venta->nombre ?></td>
                        <td><?php echo $venta->precio_unitario ?></td>
                        <td><?php echo $venta->cantidad ?></td>
                        <td><?php echo $venta->precio_total ?></td>
                        <td>
                            <a class="boton_editar_user" href="<?php echo site_url('admin/Ventas/editarVentas/' . $venta->id_historial_compras); ?>">Editar</a>
                            <a class="boton_eliminar_user" href="<?php echo site_url('admin/Ventas/cambiarEstadoVenta/' . $venta->id_historial_compras); ?>">Borrar</a>
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
