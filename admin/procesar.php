<?php
session_start();
if (!isset($_SESSION['autentificado'])) {
	header('Location: index.php');
	exit();
}
	
require_once 'conexion.php';

$id = $_GET["id"];

$procesado = mysqli_query($conn, "SELECT * FROM clientes WHERE id = '$id'");
$row = mysqli_fetch_array($procesado);

switch ($row['procesada']) {
	case '0':
		$sofya = mysqli_query($conn, "UPDATE clientes SET procesada = 1 WHERE id = '$id'");
		break;
	case '1':
		$llamada = mysqli_query($conn, "UPDATE clientes SET procesada = 2 WHERE id = '$id'");
		break;
	case '2':
		$no = mysqli_query($conn, "UPDATE clientes SET procesada = 0 WHERE id = '$id'");
		break;
}



/*if ($row['procesada'] == 0) {
	$verdadero = mysqli_query($conn, "UPDATE clientes SET procesada = 1 WHERE id = '$id'");
	} else {
		$falso = mysqli_query($conn, "UPDATE clientes SET procesada = 0 WHERE id = '$id'");
	}*/

mysqli_free_result($procesado);
mysqli_close($conn);

if ($_SESSION['autentificado'] == "super"){
	header('Location: gestion.php');
} elseif ($_SESSION['autentificado'] == "admin") {
	header('Location: gestion-admin.php');
} elseif ($_SESSION['autentificado'] == "virtual") {
	header('Location: gestion-virtual.php');
}

?>