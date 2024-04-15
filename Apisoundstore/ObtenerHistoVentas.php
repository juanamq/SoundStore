<?php 

    include 'Conexion.php';

    $consulta = $base_de_datos->query("SELECT * FROM historial_compras");
    $datos = $consulta->fetchAll();

    $respuesta['registro_histo_ventas'] = $datos;
    echo json_encode($respuesta);
    
?>

