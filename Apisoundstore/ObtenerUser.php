<?php
include 'Conexion.php';

$consulta_personas = $base_de_datos->query("SELECT * FROM personas");
$datos_personas = $consulta_personas->fetchAll(PDO::FETCH_ASSOC);

$consulta_usuarios = $base_de_datos->query("SELECT cedula, tipo, estado FROM usuarios ");
$datos_usuarios = $consulta_usuarios->fetchAll(PDO::FETCH_ASSOC);

$usuarios_mapeados = [];
foreach ($datos_usuarios as $usuario) {
    $usuarios_mapeados[$usuario['cedula']] = [
        'tipo' => $usuario['tipo'],
        'estado' => $usuario['estado']
    ];
}

foreach ($datos_personas as &$persona) {
    $cedula_persona = $persona['cedula'];
    if (isset($usuarios_mapeados[$cedula_persona])) {
        $usuario = $usuarios_mapeados[$cedula_persona];
        $persona['tipo'] = $usuario['tipo'];
        $persona['estado'] = $usuario['estado'];
    } else {
        $persona['tipo'] = null;
        $persona['estado'] = null;
    }
}

$respuesta['registros'] = $datos_personas;
echo json_encode($respuesta);
?>
