<?php 
    $dataHeader['titulo'] = "Actualizar Instrumentos";
    $dataHead['encabezado'] = "EDITAR INSTRUMENTOS";
    $this->load->view('layouts/header', $dataHead, $dataHeader); 
?>
<div class="container_instrumentos">
    <form action="<?= base_url('index.php/admin/Instrumento/updateInstrumento/' . $instrumento->id_instrumento); ?>" method="POST" class="form_instrumentos">
        <div class="form_group">
            <div class="form_item">
                <label for="nuevo_nombre">
                    <i class="fas fa-id-card"></i> Nombre Producto
                </label>
                <input type="text" id="nuevo_nombre" name="nuevo_nombre" value="<?= $instrumento->nombre ?>">
            </div>
            <div class="form_item">
                <label for="nuevo_marca">
                    <i class="fas fa-id-card"></i> Marca del Instrumento
                </label>
                <input type="text" id="nuevo_marca" name="nuevo_marca" value="<?= $instrumento->marca ?>">
            </div>
        </div>
        <div class="form_group">
            <div class="form_item">
                <label for="nuevo_stock">
                    <i class="fas fa-user"></i> Stock:
                </label>
                <input type="number" id="nuevo_stock" name="nuevo_stock" value="<?= $instrumento->stock ?>">
            </div>
            <div class="form_item">
                <label for="nuevo_precio">
                    <i class="fas fa-user"></i> Precio Venta
                </label>
                <input type="number" id="nuevo_precio" name="nuevo_precio" value="<?= $instrumento->precio ?>">
            </div>
        </div>


        <div class="form_group">
            <div class="form_item">
                <label for="nuevo_color">
                    <i class="fas fa-id-card"></i> Color del Instrumento
                </label>
                <input type="text" id="nuevo_color" name="nuevo_color" value="<?= $instrumento->color ?>">
            </div>
            <div class="form_item">
                <label for="nuevo_modelo">
                    <i class="fas fa-id-card"></i> Modelo del Instrumento
                </label>
                <input type="text" id="nuevo_modelo" name="nuevo_modelo" value="<?= $instrumento->modelo ?>">
            </div>
        </div>


        <div class="form_group">
            <div class="form_item">
                <label for="fecha_ingreso">
                    <i class="fas fa-map-marker-alt"></i> Fecha Ingreso
                </label>
                <input type="date" id="fecha_ingreso" name="fecha_ingreso" value="<?= $instrumento->fecha_registro ?>">
            </div>


            <div class="form_item">
                <label for="nuevo_tipo">
                    <i class="fas fa-user"></i> Tipo
                </label>
                <select id="nuevo_tipo" name="nuevo_tipo">
                    <option value="Guitarra" <?= ($instrumento->tipo == "Guitarra") ? "selected" : "" ?>>Guitarra</option>
                    <option value="Bajo" <?= ($instrumento->tipo == "Bajo") ? "selected" : "" ?>>Bajo</option>
                    <option value="Bateria" <?= ($instrumento->tipo == "Bateria") ? "selected" : "" ?>>Bateria</option>
                    <option value="Teclado" <?= ($instrumento->tipo == "Teclado") ? "selected" : "" ?>>Teclado</option>
                    <option value="Viento" <?= ($instrumento->tipo == "Viento") ? "selected" : "" ?>>Viento</option>
                </select>
            </div>

        </div>

        <div class="form_group">
            <div class="form_item">
                <label for="nuevo_foto">
                    <i class="fa-solid fa-file"></i> Foto Actual
                </label>
                <img src="<?= base_url('/dist/img/' . $instrumento->foto) ?>" alt="Foto del instrumento" style="max-width: 200px; max-height: 200px;">
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
                <button type="submit">Actualizar Instrumento</button>
            </div>
        </div>
    </form>
</div>

<?php 
    $this->load->view('layouts/footer'); 
?>
