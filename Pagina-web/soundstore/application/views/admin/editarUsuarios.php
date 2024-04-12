<?
$dataHeader['titulo'] = "Editar Usuarios";
$dataHead['encabezado'] = "EDIAR USUARIOS";
$this->load->view('layouts/header', $dataHead, $dataHeader);
?>
  <div class="container_edit_user">
        <form action="<?php echo site_url('admin/inicio/guardarCambiosCliente'); ?>" method="post">
            <input type="hidden" name="id_usuario" value="<?php echo isset($cliente->id_usuario) ? $cliente->id_usuario : ''; ?>">
            <div class="form_group">
                <div class="form_item">
                    <label for="nuevo_nombre">
                        <i class="fas fa-id-card"></i>Número de cedula
                    </label>
                    <input class="form-control" id="inputCedula" type="text" placeholder="Ingrese el número de documento" name="cedula" value="<?php echo $cliente->cedula; ?>" required readonly>
                </div>
                <div class="form_item">
                    <label for="nuevo_marca">
                        <i class="fas fa-id-card"></i>Nombres
                    </label>
                    <input class="form-control" id="inputNombres" type="text" placeholder="Ingrese los nombres" name="nombres" value="<?php echo $cliente->nombres; ?>" required>
                </div>
           </div>

            <div class="form_group">
                <div class="form_item">
                    <label for="nuevo_nombre">
                        <i class="fas fa-id-card"></i>Apellidos
                    </label>
                    <input class="form-control" id="inputApellidos" type="text" placeholder="Ingrese los apellidos" name="apellidos" value="<?php echo $cliente->apellidos; ?>" required>
                </div>
                <div class="form_item">
                    <label for="nuevo_marca">
                        <i class="fas fa-id-card"></i>Correo Electrónico
                    </label>
                    <input class="form-control" id="inputEmail" type="text" placeholder="Ingrese los apellidos" name="email" value="<?php echo $cliente->email; ?>" required>
                </div>
           </div>

            <div class="form_group">
                <div class="form_item">
                    <label for="nuevo_nombre">
                        <i class="fas fa-id-card"></i>Teléfono
                    </label>
                    <input class="form-control" id="inputTelefono" type="text" placeholder="Ingrese el teléfono" name="telefono" value="<?php echo $cliente->telefono; ?>" required>
                </div>
                <div class="form_item">
                    <label for="nuevo_marca">
                        <i class="fas fa-id-card"></i>Dirección
                    </label>
                    <input class="form-control" id="inputDireccion" type="text" placeholder="Ingrese la dirección" name="direccion" value="<?php echo $cliente->direccion; ?>" required>
                </div>
           </div>
           <div class="form_item">
               <label class="small mb-1" for="inputPrecio">Estado</label>
                <select class="form-select" id="inputEstado" name="estado" required>
                    <option value="ACTIVO" <?php echo ($cliente->estado == 'ACTIVO') ? 'selected' : ''; ?>>Activo</option>
                    <option value="INACTIVO" <?php echo ($cliente->estado == 'INACTIVO') ? 'selected' : ''; ?>>Inactivo</option>
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
