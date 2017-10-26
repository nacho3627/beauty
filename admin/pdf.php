<?php
session_start();
if (!isset($_SESSION['autentificado'])) {
    header('Location: index.php');
    exit();
}

header('Content-Type: text/html; charset=UTF-8');
require_once 'paginas/header.php';
require_once 'conexion.php';

// Requerimos HTML2PDF
require '../vendor/autoload.php';
use Spipu\Html2Pdf\Html2Pdf;

date_default_timezone_set('America/Montevideo');

$id = $_GET['id'] ?? '';
$c = $_GET['c'] ?? '';
$cedula = base64url_decode($c);
$fecha = date('dmY');

//Ejecutamos la sentencia SQL
$result = mysqli_query($conn, "SELECT * FROM clientes WHERE id = " . $id);
$row = mysqli_fetch_array ($result);






$pdf_template = "
<page backtop='7mm' backbottom='7mm' backleft='10mm' backright='10mm'>
        <div>
        	<h1>Nueva solicitud Virtual para Beauty Card</h1>
            <h3>DATOS PERSONALES DEL TITULAR</h3>
            <p>Nombre completo: " . $row['nombre'] . "</p>
            <p>Fecha de nacimiento: " . $row['f_nacimiento'] . "</p>
            <p>Cedula: " . $row['cedula'] . "</p>
            <p>Teléfono: " . $row['telefono'] . "</p>
            <p>Celular: " . $row['celular'] . "</p>
            <p>Domicilio: " . $row['domicilio'] . "</p>
            <p>Ciudad: " . $row['ciudad'] . "</p>
            <p>Departamento: " . $row['departamento'] . "</p>
            <p>Email: " . $row['email'] . "</p>
            <p>Razón social: " . $row['razon_social'] . "</p>
            <p>R.U.T.: " . $row['rut'] . "</p>
            <h3>DATOS PROFESIONALES DEL TITULAR</h3>
            <p>Área: " . $row['area'] . "</p>
            <p>Institución: " . $row['institucion'] . "</p>
            <p>Rol: " . $row['rol'] . "</p>
            <h3>NOMBRES DE AUTORIZADOS</h3>
            <p>Nombre autorizado 1: " . $row['nombre_aut_1'] . "</p>
            <p>Cédula autorizado 1: " . $row['cedula_aut_1'] . "</p>
            <p>Nombre autorizado 2: " . $row['nombre_aut_2'] . "</p>
            <p>Cédula autorizado 2: " . $row['cedula_aut_2'] . "</p>
        </div>
</page>
<page backtop='7mm' backbottom='7mm' backleft='10mm' backright='10mm'>
	<table align='center' width='100%'>
		<tr>
			<td style='text-align: center; width: 100%;'><img width='640' src='http://www.beautycard.com.uy/archivos/" . $row['cedula'] . "/aval_" . $row['cedula'] . ".jpg'></td>
		</tr>
	</table>
</page>
";

// Limpiamos cache
ob_end_clean();

$html2pdf = new Html2Pdf('P', 'A4', 'es', 'UTF-8');
$html2pdf->writeHTML($pdf_template);
$html2pdf->output('FormularioBC_' . $fecha . '_' . $cedula . '.pdf', 'D');