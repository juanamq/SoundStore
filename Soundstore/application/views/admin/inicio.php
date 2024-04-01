<?php 
  $dataHeader['titulo'] = "Inicio";
  $this->load->view('layouts/header', $dataHeader); 
?>
    <div class="menu">
        <h1>Menú</h1>
        <div class="cards">
            <a href="<?= base_url('index.php/admin/Inicio/openListUsers'); ?>">
                <div class="card">
                    <img src="<?php echo base_url('dist/img/fondo_menu.jpg'); ?>" alt="">
                    <h3>Usuarios</h3>
                </div>
            </a>
            <a href="<?= base_url('index.php/admin/Pedidos/openListPedidos'); ?>">
                <div class="card">
                    <img src="<?php echo base_url('dist/img/fondo_menu.jpg'); ?>" alt="">
                    <h3>Pedidos</h3>
                </div>
            </a>
            <a href="<?= base_url('index.php/admin/Ventas/openListVentas'); ?>">
                <div class="card">
                    <img src="<?php echo base_url('dist/img/fondo_menu.jpg'); ?>" alt="">
                    <h3>Ventas</h3>
                </div>
            </a>
            <a href="<?php echo base_url('index.php/admin/Instrumento/getInstrumentos'); ?>">
                <div class="card">
                    <img src="<?php echo base_url('dist/img/fondo_menu.jpg'); ?>" alt="">
                    <h3>Instrumentos</h3>
                </div>
            </a>

            <a href="ruta_para_articulos_extras">
                <div class="card">
                    <img src="<?php echo base_url('dist/img/fondo_menu.jpg'); ?>" alt="">
                    <h3>Artículos Extras</h3>
                </div>
            </a>
        </div>
    </div>
<?php 
  $this->load->view('layouts/footer'); 
?>
