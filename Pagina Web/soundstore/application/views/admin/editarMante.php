<?php
$dataHeader['titulo'] = "Editar mantenimiento";
$dataHead['encabezado'] = "EDITAR MANTENIMIENTO";
$this->load->view('layouts/header', $dataHead, $dataHeader);
?>
  <div class="container_edit_user">
    <form action="<?php echo site_url('admin/Mantenimiento/updateMantenimiento/'.$mantenimiento->id_mantenimiento); ?>" method="post">
            <input type="hidden" name="id_mantenimiento" value="<?php echo isset($mantenimiento->id_mantenimiento) ? $mantenimiento->id_mantenimiento : ''; ?>">
           
            <div class="form_item">
               <label class="small mb-1" for="nuevo_estado">Estado</label>
                <select class="form-select" id="nuevo_estado" name="nuevo_estado" required>
                    <option value="Pendiente" <?= ($mantenimiento->estado == "Pendiente") ? "selected" : "" ?>>Pendiente</option>
                    <option value="En Proceso" <?= ($mantenimiento->estado == "En Proceso") ? "selected" : "" ?>>En Proceso</option>
                    <option value="Terminado" <?= ($mantenimiento->estado == "Terminado") ? "selected" : "" ?>>Terminado</option>
                </select>
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
