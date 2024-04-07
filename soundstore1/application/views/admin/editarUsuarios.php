<!-- <?php
$dataHeader['titulo'] = "Editar cliente";
$this->load->view('layouts/header', $dataHeader);
?>
<-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <section class="content">
        <!-- Default box -->
        <div class="card card-solid">
            <div class="container-xl px-4 mt-4">
                <div class="row">
                    <div class="col-xl-4">
                        <!-- <div class="card mb-4 mb-xl-0">
                            <div class="card-header">Imagen de perfil</div>
                            <div class="card-body text-center">
                                <img src="<?php echo base_url();?>/assets/dist/img/avatar5.png" alt="Foto del cliente" class="img-circle img-fluid">
                                <div class="small font-italic text-muted mb-4">JPG o PNG máximo 5 MB</div>
                                <button class="btn btn-success" type="button">Cargar nueva imagen</button>
                            </div>
                        </div> -->
                    </div>
                    <div class="col-xl-8">
                        <div class="card mb-4">
                            <div class="card-header">Detalles del cliente</div>
                            <div class="card-body">
                                <form action="<?php echo site_url('admin/inicio/guardarCambiosCliente'); ?>" method="post">
                                    <input type="hidden" name="id_usuario" value="<?php echo isset($cliente->id_usuario) ? $cliente->id_usuario : ''; ?>">
                                    <div class="mb-3">
                                        <label class="small mb-1" for="inputCedula">Número de cedula</label>
                                        <input class="form-control" id="inputCedula" type="text" placeholder="Ingrese el número de documento" name="cedula" value="<?php echo $cliente->cedula; ?>" required>
                                    </div>
                                    
                                    <div class="mb-3">
                                        <label class="small mb-1" for="inputNombres">Nombres</label>
                                        <input class="form-control" id="inputNombres" type="text" placeholder="Ingrese los nombres" name="nombres" value="<?php echo $cliente->nombres; ?>" required>
                                    </div>

                                    <div class="mb-3">
                                        <label class="small mb-1" for="inputApellidos">Apellidos</label>
                                        <input class="form-control" id="inputApellidos" type="text" placeholder="Ingrese los apellidos" name="apellidos" value="<?php echo $cliente->apellidos; ?>" required>
                                    </div>

                                    <div class="mb-3">
                                        <label class="small mb-1" for="inputEmail">Correo Electrónico</label>
                                        <input class="form-control" id="inputEmail" type="email" placeholder="Ingrese el correo electrónico" name="email" value="<?php echo $cliente->email; ?>" required>
                                    </div>

                                    <div class="mb-3">
                                        <label class="small mb-1" for="inputTelefono">Teléfono</label>
                                        <input class="form-control" id="inputTelefono" type="tel" placeholder="Ingrese el teléfono" name="telefono" value="<?php echo $cliente->telefono; ?>" required>
                                    </div>

                                    <div class="mb-3">
                                        <label class="small mb-1" for="inputDireccion">Dirección</label>
                                        <input class="form-control" id="inputDireccion" type="text" placeholder="Ingrese la dirección" name="direccion" value="<?php echo $cliente->direccion; ?>" required>
                                    </div>

                                    <div class="mb-3">
                                        <label class="small mb-1" for="inputEstado">Estado</label>
                                        <select class="form-select" id="inputEstado" name="estado" required>
                                            <option value="ACTIVO" <?php echo ($cliente->estado == 'ACTIVO') ? 'selected' : ''; ?>>Activo</option>
                                            <option value="INACTIVO" <?php echo ($cliente->estado == 'INACTIVO') ? 'selected' : ''; ?>>Inactivo</option>
                                        </select>
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
