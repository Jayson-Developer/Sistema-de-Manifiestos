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
$stmt = $con->prepare("INSERT INTO ordenes (Nro_orden, Cliente, Cantidad, Descripcion, Peso) VALUES (?, ?, ?, ?, ?)");

// verificar si la consulta se preparó correctamente
if ($stmt === false) {
    die('Error al preparar la consulta: ' . $con->error);
}

// obtener los valores del formulario
$Nro_orden = $_POST['Nro_orden'];
$Cliente = $_POST['Cliente'];
$Cantidad = $_POST['Cantidad'];
$Descripcion = $_POST['Descripcion'];
$Peso = $_POST['Peso'];

// vincular los valores a los marcadores de posición
$stmt->bind_param('sssss', $Nro_orden, $Cliente, $Cantidad, $Descripcion, $Peso);

// ejecutar la consulta
if ($stmt->execute() === false) {
    die('Error al ejecutar la consulta: ' . $stmt->error);
}

// cerrar la conexión
$stmt->close();
$con->close();

// Redirige al usuario a la página Tabla_Ordenes.php
header("Location: Tabla_Ordenes.php");
exit(); // Finaliza la ejecución del código de Insertar_Ordenes.php
?>
