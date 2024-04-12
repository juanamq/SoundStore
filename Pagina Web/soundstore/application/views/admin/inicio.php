<?php
$dataHeader['titulo'] = "Inicio";
$this->load->view('layouts/header', $dataHeader);
?>
<div class="menu">
    <h1>Menú</h1>
    <div class="cards mt-4">
        <a class="link-offset-2 link-underline link-underline-opacity-0"
            href="<?= base_url('index.php/admin/Inicio/openListUsers'); ?>">
            <div class="card text-bg-dark">
                <img src="<?php echo base_url('dist/img/usuarios.png'); ?>" alt="">
                <div class="card-img-overlay ">
                    <h3 class="card-title " style="font-size: 1cm; color:white; text-shadow: -1px -1px 0 #000, 1px -1px 0 #000, -1px 1px 0 #000, 1px 1px 0 #000;">
                    Usuarios</h3>
                </div>
            </div>
        </a>
        

        <a class="link-offset-2 link-underline link-underline-opacity-0"
            href="<?= base_url('index.php/admin/Pedidos/openListPedidos'); ?>">
            <div class="card text-bg-dark">
                <img src="<?php echo base_url('dist/img/pedido.png'); ?>" alt="">
                <div class="card-img-overlay">
                    <h5 class="card-title" style="font-size: 1cm; color:white; text-shadow: -1px -1px 0 #000, 1px -1px 0 #000, -1px 1px 0 #000, 1px 1px 0 #000;">
                    Pedidos</h5>
                </div>
            </div>
        </a>
        <a class="link-offset-2 link-underline link-underline-opacity-0"
            href="<?= base_url('index.php/admin/Ventas/openListVentas'); ?>">
            <div class="card text-bg-dark">
                <img src="<?php echo base_url('dist/img/ventas.png'); ?>" alt="">
                <div class="card-img-overlay">
                    <h5 class="card-title" style="font-size: 1cm; color:white; text-shadow: -1px -1px 0 #000, 1px -1px 0 #000, -1px 1px 0 #000, 1px 1px 0 #000;">
                    Ventas</h5>
                </div>
            </div>
        </a>
        <a class="link-offset-2 link-underline link-underline-opacity-0"
            href="<?php echo base_url('index.php/admin/Instrumento/openListInstrumentos'); ?>">
            <div class="card text-bg-dark">
                <img src="<?php echo base_url('dist/img/instrumento_1.png'); ?>" alt="">
                <div class="card-img-overlay">
                    <h5 class="card-title" style="font-size: 1cm; color:white; text-shadow: -1px -1px 0 #000, 1px -1px 0 #000, -1px 1px 0 #000, 1px 1px 0 #000;">
                    Instrmentos</h5>
                </div>
            </div>
        </a>

        <a class="link-offset-2 link-underline link-underline-opacity-0"
            href="<?php echo base_url('index.php/admin/articulo_extra/openListArticulos_extras'); ?>">
            <div class="card text-bg-dark">
                <img src="<?php echo base_url('dist/img/articulos_extras.png'); ?>" alt="">
                <div class="card-img-overlay">
                    <h5 class="card-title" style="font-size: 1cm; color:white; text-shadow: -1px -1px 0 #000, 1px -1px 0 #000, -1px 1px 0 #000, 1px 1px 0 #000;">
                    Arículos Extras</h5>
                </div>
            </div>
        </a>

    </div>
</div>
<?php
$this->load->view('layouts/footer');
?>