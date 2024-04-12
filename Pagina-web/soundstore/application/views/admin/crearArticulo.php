<?php 
    $dataHeader['titulo'] = "Crear Articulos Extras";
    $dataHead['encabezado'] = "INGRESAR ARTICULOS";
    $this->load->view('layouts/header', $dataHead, $dataHeader); 
?>

</style>
<div class="container_instrumentos">
    <form action="<?= base_url('index.php/admin/Articulo_extra/createArticulos'); ?>" method="POST" class="form_articulos" enctype="multipart/form-data">
        <div class="form_group">
            <div class="form_item">
                <label for="nuevo_nombre">
                    <i class="fas fa-id-card"></i> Nombre Producto
                </label>
                <input type="text" id="nuevo_nombre" name="nuevo_nombre" value="">
            </div>
            <div class="form_item">
                <label for="nuevo_marca">
                    <i class="fas fa-id-card"></i> Marca del Articulo
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
                    <i class="fas fa-id-card"></i> Color del Articulo
                </label>
                <input type="text" id="nuevo_color" name="nuevo_color" value="">
            </div>
            <div class="form_item">
                <label for="nuevo_modelo">
                    <i class="fas fa-id-card"></i> Modelo del Articulo
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
                    <option value="Pua">Pua</option>
                    <option value="Baquetas">Baquetas</option>
                    <option value="Tecladepiano">Tecla de piano</option>
                    <option value="Amplificador">Amplificador</option>
                </select>
            </div>
        </div>

        <div class="row mb-3">
            <div class="col">
                <label for="nuevo_estado" class="form-label">
                  <i class="fas fa-user"></i> Estado
                </label>
                <select class="form-control" id="nuevo_estado" name="nuevo_estado" value="estado">
                  <option value="ACTIVO">ACTIVO</option>
                  <option value="INACTIVO">INACTIVO</option>
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
              <button>Registrar Articulo</button>
            </div>
        </div>
    </form>
</div>
<?php 
    $this->load->view('layouts/footer'); 
?>
