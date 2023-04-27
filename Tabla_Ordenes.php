<?php
// Incluir archivo de conexión a la base de datos
include_once 'Conexion.php';

// Establecer la conexión con la base de datos
$con = conectar();

// Preparar la consulta para obtener los datos de la tabla "ordenes"
$stmt = $con->prepare("SELECT * FROM ordenes");

// Verificar si la consulta se preparó correctamente
if ($stmt === false) {
    die('Error al preparar la consulta: ' . $con->error);
}

// Ejecutar la consulta y almacenar los resultados en una variable
$stmt->execute();
$resultado = $stmt->get_result();

// Convertir el resultado en un array asociativo y almacenarlo en una variable
$ordenes = array();
while ($row = $resultado->fetch_assoc()) {
    $ordenes[] = $row;
}

// Cerrar la conexión
$stmt->close();
$con->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Tabla de manifiesto</title>
<!-- DISEÑO -->

    <style>
		table {
			border-collapse: collapse;
			width: 100%;
		}
		th, td {
			text-align: left;
			padding: 8px;
			border-bottom: 1px solid #ddd;
		}
		tr:hover {background-color:#f5f5f5;}
	</style>
<!-- DISEÑO -->
</head>
<body>

<table>
    <thead>
        <tr>
            <th>Nro. Orden</th>
            <th>Cliente</th>
            <th>Cantidad</th>
            <th>Descripción</th>
            <th>Peso</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($ordenes as $orden) { ?>
            <tr>
                <td><?php echo $orden['Nro_orden']; ?></td>
                <td><?php echo $orden['Cliente']; ?></td>
                <td><?php echo $orden['Cantidad']; ?></td>
                <td><?php echo $orden['Descripcion']; ?></td>
                <td><?php echo $orden['Peso']; ?></td>
                <td>
                <button onclick="location.href='Index.php?Nro_orden=<?php echo $orden['Nro_orden']; ?>'">Modificar</button>

              
                <button onclick="location.href='Eliminar_Orden.php?Nro_orden=<?php echo $orden['Nro_orden']; ?>')">Eliminar</button>
                </td>

             

            </tr>
        <?php } ?>
    </tbody>
</table>

</body>
</html>


      

