<?php 

    include 'Conexion.php';

    $consulta = $base_de_datos->query("SELECT * FROM historial_pedidos_ventas");
    $datos = $consulta->fetchAll();

    $respuesta['registro_pedidos'] = $datos;
    echo json_encode($respuesta);
    
?>

