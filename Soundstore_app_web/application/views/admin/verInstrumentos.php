<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ver Instrumentos</title>
    <!-- Agrega cualquier estilo adicional que desees -->
    <style>
        /* Estilos personalizados aquí */
    </style>
</head>
<body>
    <h1>Lista de Instrumentos</h1>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Marca</th>
                <th>Stock</th>
                <th>Tipo</th>
                <th>Color</th>
                <th>Modelo</th>
                <th>Precio</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($instrumentos as $instrumento): ?>
            <tr>
                <td><?php echo $instrumento['id_instrumento']; ?></td>
                <td><?php echo $instrumento['nombre']; ?></td>
                <td><?php echo $instrumento['marca']; ?></td>
                <td><?php echo $instrumento['stock']; ?></td>
                <td><?php echo $instrumento['tipo']; ?></td>
                <td><?php echo $instrumento['color']; ?></td>
                <td><?php echo $instrumento['modelo']; ?></td>
                <td><?php echo $instrumento['precio']; ?></td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>
