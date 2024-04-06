<?php 
    $dataHeader['titulo'] = "Crear Instrumentos";
    $dataHead['encabezado'] = "INGRESAR INSTRUMENTOS";
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
    <form action="<?= base_url('index.php/admin/Instrumento/createInstrumento'); ?>" method="POST" class="form_instrumentos">
        <div class="form_group">
            <div class="form_item">
                <label for="nuevo_nombre">
                    <i class="fas fa-id-card"></i> Nombre Producto
                </label>
                <input type="text" id="nuevo_nombre" name="nuevo_nombre" value="">
            </div>
            <div class="form_item">
                <label for="nuevo_marca">
                    <i class="fas fa-id-card"></i> Marca del Instrumento
                </label>
                <input type="text" id="nuevo_marca" name="nuevo_marca" value="">
            </div>
        </div>

        <div class="form_group">
            <div class="form_item">
                <label for="nuevo_stock">
                    <i class="fas fa-user"></i> Stock:
                </label>
                <input type="number" id="nuevo_stock" name="nuevo_stock" value="">
            </div>
            <div class="form_item">
                <label for="nuevo_precio">
                    <i class="fas fa-user"></i> Precio Venta
                </label>
                <input type="number" id="nuevo_precio" name="nuevo_precio" value="">
            </div>
        </div>


        <div class="form_group">
            <div class="form_item">
                <label for="nuevo_color">
                    <i class="fas fa-id-card"></i> Color del Instrumento
                </label>
                <input type="text" id="nuevo_color" name="nuevo_color" value="">
            </div>
            <div class="form_item">
                <label for="nuevo_modelo">
                    <i class="fas fa-id-card"></i> Modelo del Instrumento
                </label>
                <input type="text" id="nuevo_modelo" name="nuevo_modelo" value="">
            </div>
        </div>


        <div class="form_group">
            <div class="form_item">
                <label for="fecha_ingreso">
                    <i class="fas fa-map-marker-alt"></i> Fecha Ingreso
                </label>
                <input type="date" id="fecha_ingreso" name="fecha_ingreso" value="">
            </div>
            <div class="form_item">
                <label for="nuevo_tipo">
                    <i class="fas fa-user"></i> Tipo
                </label>
                <select id="nuevo_tipo" name="nuevo_tipo">
                    <option value="Guitarra">Guitarra</option>
                    <option value="Bajo">Bajo</option>
                    <option value="Bateria">Bateria</option>
                    <option value="Teclado">Teclado</option>
                    <option value="Viento">Viento</option>
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
              <button>Registrar Instrumento</button>
            </div>
        </div>
    </form>
</div>
<?php 
  $this->load->view('layouts/footer'); 
?>
