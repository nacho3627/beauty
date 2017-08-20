<?php
session_start();
if (!isset($_SESSION['autentificado'])) {
	header('Location: index.php');
	exit();
}
	
require_once 'conexion.php';

$id = $_GET["id"];

$eliminado = mysqli_query($conn, "DELETE FROM clientes WHERE id = '$id'");


mysqli_free_result($eliminado);
mysqli_close($conn);

if ($_SESSION['autentificado'] == "super"){
	header('Location: gestion.php');
} elseif ($_SESSION['autentificado'] == "admin") {
	header('Location: gestion-admin.php');
} elseif ($_SESSION['autentificado'] == "virtual") {
	header('Location: gestion-virtual.php');
}

?>