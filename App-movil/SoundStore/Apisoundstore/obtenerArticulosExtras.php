<?php 

    include 'Conexion.php';

    $consulta = $base_de_datos->query("SELECT nombre, marca, foto, tipo, color, modelo, precio FROM articulos_extras");
    $datos = $consulta->fetchAll();

    $respuesta['articulos_extras'] = $datos;
    echo json_encode($respuesta);
    
?>

