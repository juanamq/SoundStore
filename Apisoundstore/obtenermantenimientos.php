<?php 

    include 'Conexion.php';

    $consulta = $base_de_datos->query("SELECT * FROM manteniento");
    $datos = $consulta->fetchAll();

    $respuesta['registro_mantenimientos'] = $datos;
    echo json_encode($respuesta);
    
?>