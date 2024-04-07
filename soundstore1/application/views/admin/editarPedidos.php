<?php
$dataHeader['titulo'] = "Editar Pedidos";
$dataHead['encabezado'] = "EDITAR PEDIDOS";
$this->load->view('layouts/header', $dataHead, $dataHeader);
?>
<div
	class=" border border-5 border-light-subtle position-absolute top-50 start-50 translate-middle texto shadow-lg color p-3 mb- rounded mt-4 ">

	<form class="p-3  bg-opacity-10  text-center "
		action="<?php echo site_url('admin/Pedidos/guardarCambiosPedidos'); ?>" method="post">
		<input type="hidden" name="id_pedido"
			value="<?php echo isset($pedido->id_pedido) ? $pedido->id_pedido : ''; ?>">
		<?php
		echo "Id  pedido" . $pedido->id_pedido;
		?>
		<div class="row mb-4 ">
			<div class="col">

				<label class="form-label fw-bold " for="inputCliente">Cliente</label>
				<input class="form-control border border-dark text-center" id="inputCliente" type="text"
					placeholder="Ingrese el cliente" name="cliente" value="<?php echo $pedido->cliente; ?>" required>
			</div>
			<div class="col">

				<label class="form-label fw-bold" for="inputProduto">Producto</label>
				<input class="form-control border border-dark text-center" id="inputProducto" type="text"
					placeholder="Ingrese el nombre  del producto" name="producto"
					value="<?php echo $pedido->producto; ?>" required>

			</div>
		</div>
		<div class="row mb-4">
			<div class="col">
				<label class="form-label fw-bold" for="inputDireccion">Dirección</label>
				<input class="form-control border border-dark text-center" id="inputDireccion" type="text"
					placeholder="Ingrese el nombre  del direccion" name="direccion"
					value="<?php echo $pedido->direccion; ?>" required>
			</div>
			<div class="col">
				<label class="form-label fw-bold" for="inputCantidad">Cantidad Total</label>
				<input class="form-control border border-dark text-center" id="inputCantidad" type="text"
					placeholder="Ingrese el nombre  del cantidad" name="cantidad"
					value="<?php echo $pedido->cantidad; ?>" required>
			</div>
		</div>

		<div class="row mb-4">
			<div class="col">
				<label class="form-label fw-bold" for="inputPrecio">Precio Total</label>
				<input class="form-control border border-dark text-center" id="inputPrecio" type="text"
					placeholder="Ingrese el nombre  del precio total" name="precio_total"
					value="<?php echo $pedido->precio_total; ?>" required>
			</div>
			<div class="col">
				<label class="form-label fw-bold" for="inputfechaPedido">Fecha del Pedido</label>
				<input class="form-control border border-dark text-center" id="inputfechaPedido" type="text"
					placeholder="Ingrese el nombre  de la fecha pedido" name="fecha_pedido"
					value="<?php echo $pedido->fecha_pedido; ?>" required>
			</div>
		</div>

		<div class="text-center mt-4">
			<button type="submit" class="fw-bold btn btn-outline-success">Guardar cambios</button>
		</div>

	</form>


</div>


<?php
$this->load->view('layouts/footer');
?>