<?php 

    include 'Conexion.php';

    $consulta = $base_de_datos->query("SELECT * FROM instrumentos");
    $datos = $consulta->fetchAll();

    $respuesta['registros_intrumentos'] = $datos;
    echo json_encode($respuesta);
    
?>

