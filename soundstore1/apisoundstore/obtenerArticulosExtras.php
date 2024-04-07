<?php 

    include 'Conexion.php';

    $consulta = $base_de_datos->query("SELECT * FROM articulos_extras");
    $datos = $consulta->fetchAll();

    $respuesta['articulos_extras'] = $datos;
    echo json_encode($respuesta);
    
?>

