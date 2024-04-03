<?php 
    $dataHeader['titulo'] = "Actualizar Instrumentos";
    $dataHead['encabezado'] = "EDITAR INSTRUMENTOS";
    $this->load->view('layouts/header', $dataHead, $dataHeader); 
?>

<style>
    /* Estilos para el contenedor del formulario */
.container_instrumentos {
    max-width: 600px;
    margin: 50px auto 0 auto;
    padding: 20px;
    background-color: #f9f9f9;
    border-radius: 10px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

/* Estilos para los grupos de elementos */
.form_group {
    display: flex;
    justify-content: space-between;
    margin-bottom: 20px;
}

/* Estilos para cada elemento del formulario */
.form_item {
    flex: 0 0 48%; /* Ajustar según el diseño deseado */
}

/* Estilos para etiquetas */
.form_item label {
    font-weight: bold;
    display: block;
    margin-bottom: 5px;
}

/* Estilos para campos de entrada */
.form_item input[type="text"],
.form_item input[type="number"],
.form_item select,
.form_item textarea {
    width: 100%;
    padding: 10px;
    margin: 8px 0;
    border: 1px solid #ccc;
    border-radius: 5px;
    box-sizing: border-box;
}

/* Estilos para el botón */
.form_item button[type="submit"] {
    width: 100%;
    background-color: #4CAF50;
    color: white;
    padding: 14px 20px;
    margin: 8px 0;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    transition: background-color 0.3s;
}

.form_item button[type="submit"]:hover {
    background-color: #45a049;
}

/* Estilos para el contenedor del botón */
.text-center {
    text-align: center;
}
</style>

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
                    <i class="fa-solid fa-file"></i> Seleccione una Imagen
                </label>
                <div class="custom-file">
                    <input type="file" class="custom-file-input" id="nuevo_foto" name="nuevo_foto">
                    <label class="custom-file-label" for="nuevo_foto" data-browse="Examinar">Elegir archivo</label>
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
