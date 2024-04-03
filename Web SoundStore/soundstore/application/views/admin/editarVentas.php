<!-- <?php
$dataHeader['titulo'] = "Editar Ventas";
$this->load->view('layouts/header', $dataHeader);
?>
<-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <section class="content">
        <!-- Default box -->
        <div class="card card-solid">
            <div class="container-xl px-4 mt-4">
                <div class="row">
                    <div class="col-xl-8">
                        <div class="card mb-4">
                            <div class="card-body">
                                <form action="<?php echo site_url('admin/Ventas/guardarCambiosVentas'); ?>" method="post">
                                    <input type="hidden" name="id_historial_compras" value="<?php echo isset($venta->id_historial_compras) ? $venta->id_historial_compras : ''; ?>">
                                    <?php
                                        echo "Id  Compra" .  $venta->id_historial_compras;
                                    ?>
                                    <div class="mb-3">
                                        <label class="small mb-1" for="inputMarca">Marca Del Instrumento</label>
                                        <input class="form-control" id="inputMarca" type="text" placeholder="Ingrese la marca  del instrumento" name="marca" value="<?php echo $venta->marca; ?>" required>
                                    </div>
                                    
                                    <div class="mb-3">
                                        <label class="small mb-1" for="inputNombre">Nombre Instrumento</label>
                                        <input class="form-control" id="inputNombre" type="text" placeholder="Ingrese el nombre  del instrumento" name="nombre" value="<?php echo $venta->nombre; ?>" required>
                                    </div>

                                    <div class="mb-3">
                                        <label class="small mb-1" for="inputPrecioUnitario">Precio Unitario</label>
                                        <input class="form-control" id="inputPrecioUnitario" type="text" placeholder="Ingrese el precio unitario" name="precio_unitario" value="<?php echo $venta->precio_unitario; ?>" required>
                                    </div>

                                    <div class="mb-3">
                                        <label class="small mb-1" for="inputCantidad">Cantidad Vendida</label>
                                        <input class="form-control" id="inputCantidad" type="text" placeholder="Ingrese la cantidad vendida" name="cantidad" value="<?php echo $venta->cantidad; ?>" required>
                                    </div>

                                    <div class="mb-3">
                                        <label class="small mb-1" for="inputPrecio">Precio Total</label>
                                        <input class="form-control" id="inputPrecio" type="text" placeholder="Ingrese el precio total" name="precio_total" value="<?php echo $venta->precio_total; ?>" required>
                                    </div>
                                    <button class="btn btn-success" type="submit">Guardar cambios</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<?php
$this->load->view('layouts/footer');
?> 
