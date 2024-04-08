<?php 
    $dataHeader['titulo'] = "Actualizar Articulos Extras";
    $dataHead['encabezado'] = "Actualizar Articulos Extras";
    $this->load->view('layouts/header', $dataHead, $dataHeader); 
?>

<div class="container_instrumentos">
    <form action="<?= base_url('index.php/admin/Articulo_extra/updateArticulos/' . $articulo_extra->id_articulo); ?>" method="POST" class="form_articulos">
        <div class="form_group">
            <div class="form_item">
                <label for="nuevo_nombre">
                    <i class="fas fa-id-card"></i> Nombre Producto
                </label>
                <input type="text" id="nuevo_nombre" name="nuevo_nombre" value="<?= $articulo_extra->nombre ?>">
            </div>
            <div class="form_item">
                <label for="nuevo_marca">
                    <i class="fas fa-id-card"></i> Marca del Articulo
                </label>
                <input type="text" id="nuevo_marca" name="nuevo_marca" value="<?= $articulo_extra->marca ?>">
            </div>
        </div>
        <div class="form_group">
            <div class="form_item">
                <label for="nuevo_stock">
                    <i class="fas fa-user"></i> Stock:
                </label>
                <input type="number" id="nuevo_stock" name="nuevo_stock" value="<?= $articulo_extra->stock ?>">
            </div>
            <div class="form_item">
                <label for="nuevo_precio">
                    <i class="fas fa-user"></i> Precio Venta
                </label>
                <input type="number" id="nuevo_precio" name="nuevo_precio" value="<?= $articulo_extra->precio ?>">
            </div>
        </div>


        <div class="form_group">
            <div class="form_item">
                <label for="nuevo_color">
                    <i class="fas fa-id-card"></i> Color del Articulo
                </label>
                <input type="text" id="nuevo_color" name="nuevo_color" value="<?= $articulo_extra->color ?>">
            </div>
            <div class="form_item">
                <label for="nuevo_modelo">
                    <i class="fas fa-id-card"></i> Modelo del Articulo
                </label>
                <input type="text" id="nuevo_modelo" name="nuevo_modelo" value="<?= $articulo_extra->modelo ?>">
            </div>
        </div>


        <div class="form_group">
            <div class="form_item">
                <label for="fecha_ingreso">
                    <i class="fas fa-map-marker-alt"></i> Fecha Ingreso
                </label>
                <input type="date" id="fecha_ingreso" name="fecha_ingreso" value="<?= $articulo_extra->fecha_registro ?>">
            </div>
            <div class="form_item">
                <label for="nuevo_tipo">
                    <i class="fas fa-user"></i> Tipo
                </label>
                <select id="nuevo_tipo" name="nuevo_tipo">
                    <option value="Pua" <?= ($articulo_extra->tipo == "Pua") ? "selected" : "" ?>>Pua</option>
                    <option value="Baquetas" <?= ($articulo_extra->tipo == "Baquetas") ? "selected" : "" ?>>Baquetas</option>
                    <option value="Tecladepiano" <?= ($articulo_extra->tipo == "Tecladepiano") ? "selected" : "" ?>>Tecla de piano</option>
                    <option value="Amplificador" <?= ($articulo_extra->tipo == "Amplificador") ? "selected" : "" ?>>Amplificador</option>
                </select>
            </div>

        </div>

        <div class="form_group">
            <div class="form_item">
                <label for="nuevo_foto">
                    <i class="fa-solid fa-file"></i> Foto Actual
                </label>
                <img src="<?= base_url('/dist/img/' . $articulo_extra->foto) ?>" alt="Foto del instrumento" style="max-width: 200px; max-height: 200px;">
            </div>
        </div>


        <div class="form_group">
            <div class="form_item">
                <label for="nuevo_foto">
                    <i class="fa-solid fa-file"></i> Cambiar Foto
                </label>
                <div class="custom-file">
                    <input type="file" class="custom-file-input" id="nuevo_foto" name="nuevo_foto">
                    <label class="custom-file-label" for="nuevo_foto" data-browse="Examinar">Seleccionar archivo</label>
                </div>
            </div>
        </div>

        <div class="text-center">
            <div class="nav-item">
                <button type="submit">Actualizar Articulo</button>
            </div>
        </div>
    </form>
</div>

<?php 
    $this->load->view('layouts/footer'); 
?>
