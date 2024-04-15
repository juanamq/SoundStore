<?php 

    include 'Conexion.php';

    $consulta = $base_de_datos->query("SELECT * FROM usuarios WHERE tipo = 'ADMIN'");
    $datos = $consulta->fetchAll();

    $respuesta['registro_usuarios'] = $datos;
    echo json_encode($respuesta);
    
?>