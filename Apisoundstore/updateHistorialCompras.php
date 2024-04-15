<?php
header("Access-Control-Allow-Origin: * "); // Permite el acceso desde cualquier origen, o usa "http://localhost" si solo quieres permitirlo desde localhost.
header("Access-Control-Allow-Methods: POST"); 
header("Access-Control-Allow-Headers: Content-Type");
include 'Conexion.php';


if (!empty($_POST['id_historial_compras']) && !empty($_POST['marca']) && !empty($_POST['nombre']) && !empty($_POST['precio_unitario']) && !empty($_POST['cantidad']) && !empty($_POST['precio_total'])) {

    $id_historial_compras = $_POST['id_historial_compras'];
    $marca = $_POST['marca'];
    $nombre = $_POST['nombre'];
    $precio_unitario = $_POST['precio_unitario'];
    $cantidad = $_POST['cantidad'];
    $precio_total = $_POST['precio_total'];

    
    $consulta = $base_de_datos->prepare("UPDATE historial_compras SET marca = :marca, nombre = :nombre, precio_unitario = :precio_unitario, cantidad = :cantidad, precio_total = :precio_total WHERE id_historial_compras = :id_historial_compras");
    $consulta->bindParam(':id_historial_compras', $id_historial_compras);
    $consulta->bindParam(':marca', $marca);
    $consulta->bindParam(':nombre', $nombre);
    $consulta->bindParam(':precio_unitario', $precio_unitario);
    $consulta->bindParam(':cantidad', $cantidad);
    $consulta->bindParam(':precio_total', $precio_total);

    
    if ($consulta->execute()) {
        $respuesta = [
            'status' => true,
            'message' => 'El historial de compras se actualizó correctamente.'
        ];
    } else {
        $respuesta = [
            'status' => false,
            'message' => 'Error al actualizar el historial de compras.'
        ];
    }
} else {
    $respuesta = [
        'status' => false,
        'message' => 'No se proporcionó el ID del historial de compras o los datos actualizados.'
    ];
}


echo json_encode($respuesta);
?>