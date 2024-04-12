<?php 

    include 'Conexion.php';


    $consulta = $base_de_datos->query("SELECT  nombre, marca, foto, tipo, color, modelo, precio FROM instrumentos");
    $datos = $consulta->fetchAll();

    $respuesta['intrumentos'] = $datos;
    echo json_encode($respuesta);
    
?>

