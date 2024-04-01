<?php 
    $dataHeader['titulo'] = "Historial Pedidos";
    $dataHead['encabezado'] = "HISTORIAL DE PEDIDOS";
    $this->load->view('layouts/header', $dataHead, $dataHeader); 
?>


<div>
    <table class="table_pedidos">
        <thead>
            <tr>
                <th scope="col">id_pedido</th>
                <th scope="col">id_instrumento</th>
                <th scope="col">id_usuario instrumento</th>
                <th scope="col">cliente</th>
                <th scope="col">producto</th>
                <th scope="col">direccion</th>
                <th scope="col">cantidad total</th>
                <th scope="col">precio_total</th>
                <th scope="col">fecha_pedido</th>
                <th scope="col">Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($pedidos as $pedido) : ?>
                <tr>
                    <td><?php echo $pedido->id_pedido ?></td>
                    <td><?php echo $pedido->id_instrumento ?></td>
                    <td><?php echo $pedido->id_usuario ?></td>
                    <td><?php echo $pedido->cliente ?></td>
                    <td><?php echo $pedido->producto ?></td>
                    <td><?php echo $pedido->direccion ?></td>
                    <td><?php echo $pedido->cantidad ?></td>
                    <td><?php echo $pedido->precio_total ?></td>
                    <td><?php echo $pedido->fecha_pedido ?></td>
                    <td>
                        <a class="boton_editar_user" href="guardar_per/<?php echo $pedido->id_pedido ?>">Editar</a>
                        <a class="boton_eliminar_user" href="borrar_per/<?php echo $pedido->id_pedido ?>">Borrar</a>
                    </td>
                </tr>
            <?php endforeach ?>
        </tbody>
    </table>
</div>


<?php 
    $this->load->view('layouts/footer'); 
?>
