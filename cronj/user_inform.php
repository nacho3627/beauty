<?php
header('Content-Type: text/html; charset=UTF-8');
date_default_timezone_set("America/Montevideo");
require_once('../admin/conexion.php');

$today = time();
$from_date = $today - 604800; // Calculo cuanto es una semana antes en segundos


$sql = "SELECT * FROM clientes WHERE f_ingreso_unix > " . $from_date;
$result = mysqli_query($conn, $sql);

// DATOS PARA EL MAIL
// Para el envio en formato html
$headers = "MIME-Version: 1.0\r\n";
$headers .= "Content-type: text/html; charset=utf-8\r\n";
// Direccion del remitente
$headers .= "From: Beauty Card <web@beautycard.com.uy>\r\n";
// Direccion de respuesta
$headers .= "Reply-To: web@casani.com.uy\r\n";

$header .= "Bcc: web@casani.com.uy\r\n";

$to = "ignacio@casani.com.uy";
$subject = "Solicitudes semanales";
$message = "
<style>
* { font-family: Arial;}
</style>
<h1>Ingresos de esta semana</h1>
<p>Estas fueron las solicitudes que se hicieron en la semana</p>

<table width='600' cellspacing='5'>
	<tr style='font-weight: bold;'>
		<td width='40%'>Nombre</td>
		<td width='20%'>Cédula</td>
		<td width='40%'>Fecha de ingreso</td>
	</tr>
";

while ($row = mysqli_fetch_array($result)) {
	
	$message .= '<tr>';
	$message .= '<td>' . $row['nombre'] . '</td>';
	$message .= '<td>' . $row['cedula'] . '</td>';
	$message .= '<td>' . $row['f_ingreso'] . '</td>';
	$message .= '</tr>';
}

$message .= "</table>";

mail($to, $subject, $message, $headers);

?>