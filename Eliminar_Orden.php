<?php
// Incluir archivo de conexión a la base de datos
include_once 'Conexion.php';

// Establecer la conexión con la base de datos
$con = conectar();

// verificar si hubo un error en la conexión
if ($con->connect_error) {
    die('Error de conexión: ' . $con->connect_error);
}

// preparar la consulta con marcadores de posición
$stmt = $con->prepare("DELETE FROM ordenes WHERE Nro_orden=?");

// verificar si la consulta se preparó correctamente
if ($stmt === false) {
    die('Error al preparar la consulta: ' . $con->error);
}

// obtener el valor del número de orden a eliminar
$Nro_orden = $_GET['Nro_orden'];

// vincular el valor al marcador de posición
$stmt->bind_param('s', $Nro_orden);

// ejecutar la consulta
if ($stmt->execute() === false) {
    die('Error al ejecutar la consulta: ' . $stmt->error);
}

// cerrar la conexión
$stmt->close();
$con->close();

// Redirige al usuario a la página Tabla_Ordenes.php
header("Location: Tabla_Ordenes.php");
exit(); // Finaliza la ejecución del código de Eliminar_Orden.php
?>
