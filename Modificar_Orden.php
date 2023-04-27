<?php
// Incluir archivo de conexión a la base de datos
include_once 'Conexion.php';

// Establecer la conexión con la base de datos
$con = conectar();

// verificar si hubo un error en la conexión
if ($con->connect_error) {
    die('Error de conexión: ' . $con->connect_error);
}

// Verificar si se ha enviado el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // preparar la consulta con marcadores de posición
    $stmt = $con->prepare("UPDATE ordenes SET Cliente=?, Cantidad=?, Descripcion=?, Peso=? WHERE Nro_orden=?");

    // verificar si la consulta se preparó correctamente
    if ($stmt === false) {
        die('Error al preparar la consulta: ' . $con->error);
    }

    // obtener los valores del formulario
    $Cliente = $_POST['Cliente'];
    $Cantidad = $_POST['Cantidad'];
    $Descripcion = $_POST['Descripcion'];
    $Peso = $_POST['Peso'];
    $Nro_orden = $_POST['Nro_orden'];

    // vincular los valores a los marcadores de posición
    $stmt->bind_param('sssss', $Cliente, $Cantidad, $Descripcion, $Peso, $Nro_orden);

    // ejecutar la consulta
    if ($stmt->execute() === false) {
        die('Error al ejecutar la consulta: ' . $stmt->error);
    }

    // cerrar la conexión
    $stmt->close();
    $con->close();

    // Redirige al usuario a la página Tabla_Ordenes.php
    header("Location: Index.php");
    exit();
} else if (isset($_GET['Nro_orden'])) {
        // obtener el Nro_orden enviado desde la página Tabla_Ordenes.php
        $Nro_orden = $_GET['Nro_orden'];

    // preparar la consulta para obtener los datos de la orden correspondiente
    $stmt = $con->prepare("SELECT * FROM ordenes WHERE Nro_orden=?");

    // verificar si la consulta se preparó correctamente
    if ($stmt === false) {
        die('Error al preparar la consulta: ' . $con->error);
    }

    // vincular el valor del Nro_orden al marcador de posición
    $stmt->bind_param('s', $Nro_orden);

    // ejecutar la consulta y almacenar los resultados en una variable
    $stmt->execute();
    $resultado = $stmt->get_result();

    // Convertir el resultado en un array asociativo y almacenarlo en una variable
    $orden = $resultado->fetch_assoc();

    // cerrar la conexión
    $stmt->close();
    $con->close();
}
    // Redirige al usuario a la página Tabla_Ordenes.php
header("Location: Tabla_Ordenes.php");
exit(); // Finaliza la ejecución del código de Modificar_Orden.php
?>
