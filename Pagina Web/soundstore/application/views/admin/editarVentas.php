<?php 
    $dataHeader['titulo'] = "Actualizar ventas";
    $dataHead['encabezado'] = "EDITAR VENTAS";
    $this->load->view('layouts/header', $dataHead, $dataHeader); 
?>

<div class="container_edit_ventas">
    <form action="<?php echo site_url('admin/Ventas/guardarCambiosVentas'); ?>" method="post"  class="form_instrumentos">
        <input type="hidden" name="id_historial_compras" value="<?php echo isset($venta->id_historial_compras) ? $venta->id_historial_compras : ''; ?>">
        <div class="form_group">
            <div class="form_item">
                <label for="nuevo_nombre">
                    <i class="fas fa-id-card"></i>Marca Del Instrumento
                </label>
                <input class="form-control" id="inputMarca" type="text" placeholder="Ingrese la marca del instrumento" name="marca" value="<?php echo $venta->marca; ?>" required>
            </div>
            <div class="form_item">
                <label for="nuevo_marca">
                    <i class="fas fa-id-card"></i> Nombre Instrumento
                </label>
                <input class="form-control" id="inputNombre" type="text" placeholder="Ingrese el nombre del instrumento" name="nombre" value="<?php echo $venta->nombre; ?>" required>
            </div>
        </div>

        <div class="form_group">
            <div class="form_item">
                <label for="nuevo_nombre">
                    <i class="fas fa-id-card"></i>Precio Unitario
                </label>
                <input class="form-control" id="inputPrecioUnitario" type="text" placeholder="Ingrese el precio unitario" name="precio_unitario" value="<?php echo $venta->precio_unitario; ?>" required>
            </div>
            <div class="form_item">
                <label for="nuevo_marca">
                    <i class="fas fa-id-card"></i>Cantidad Vendida
                </label>
                <input class="form-control" id="inputCantidad" type="text" placeholder="Ingrese la cantidad vendida" name="cantidad" value="<?php echo $venta->cantidad; ?>" required>
            </div>
        </div>

        <div class="form_item">
            <label class="small mb-1" for="inputPrecio">Precio Total</label>
            <input class="form-control" id="inputPrecio" type="text" placeholder="Ingrese el precio total" name="precio_total" value="<?php echo $venta->precio_total; ?>" required>
        </div>
        <div class="text-center">
            <div class="nav-item">
            <button type="submit">Guardar cambios</button>
            </div>
        </div>
    </form>
</div>
<?php
$this->load->view('layouts/footer');
?>
