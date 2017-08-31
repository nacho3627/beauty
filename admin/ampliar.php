<?php
session_start();
if (!isset($_SESSION['autentificado'])) {
	header('Location: index.php');
	exit();
}

//conectar a base de datos
require_once 'conexion.php';

$cliente = $_GET['id'];

//Ejecutamos la sentencia SQL
$result = mysqli_query($conn, "SELECT * FROM clientes WHERE id = $cliente");
$datos = mysqli_fetch_array ($result);

require_once 'paginas/header.php';
?>

	<div class="text-left">
		<h2 class="titulo">Detalles de <?php echo $datos['nombre']; ?>  <small style="font-size: 12px;"><a href="javascript:history.go(-1);">Volver</a></small></h2>
	
	</div>

	<div class="row datos">
		<div class="col-xs-6 col-sm-4 col-md-3">
			<div class="dato">
				<h4>Nombre: </h4>
				<p><?php echo $datos['nombre'];?></p>
			</div>
		</div>
		<div class="col-xs-6 col-sm-4 col-md-3">
			<div class="dato">
				<h4>Cédula: </h4>
				<p><?php echo $datos['cedula'];?></p>
			</div>
		</div>
		<div class="col-xs-6 col-sm-4 col-md-3">
			<div class="dato">
				<h4>Fecha de nacimiento: </h4>
				<p><?php echo $datos['f_nacimiento'];?></p>
			</div>
		</div>
		<div class="col-xs-6 col-sm-4 col-md-3">
			<div class="dato">
				<h4>Teléfono: </h4>
				<p><?php echo $datos['telefono'];?></p>
			</div>
		</div>
		<div class="col-xs-6 col-sm-4 col-md-3">
			<div class="dato">
				<h4>Celular: </h4>
				<p><?php echo $datos['celular'];?></p>
			</div>
		</div>
		<div class="col-xs-6 col-sm-4 col-md-3">
			<div class="dato">
				<h4>Domicilio: </h4>
				<p><?php echo $datos['domicilio'];?></p>
			</div>
		</div>
		<div class="col-xs-6 col-sm-4 col-md-3">
			<div class="dato">
				<h4>Departamento: </h4>
				<p><?php echo $datos['departamento'];?></p>
			</div>
		</div>
		<div class="col-xs-6 col-sm-4 col-md-3">
			<div class="dato">
				<h4>Ciudad: </h4>
				<p><?php echo $datos['ciudad'];?></p>
			</div>
		</div>
		<div class="col-xs-6 col-sm-4 col-md-3">
			<div class="dato">
				<h4>Razón social:</h4>
				<p><?php echo $datos['razon_social'];?></p>
			</div>
		</div>
		<div class="col-xs-6 col-sm-4 col-md-3">
			<div class="dato">
				<h4>RUT:</h4>
				<p><?php echo $datos['rut'];?></p>
			</div>
		</div>
		<div class="col-xs-6 col-sm-4 col-md-3">
			<div class="dato">
				<h4>E-mail:</h4>
				<p><?php echo $datos['email'];?></p>
			</div>
		</div>
		<div class="col-xs-6 col-sm-4 col-md-3">
			<div class="dato">
				<h4>Área:</h4>
				<p><?php echo $datos['area'];?></p>
			</div>
		</div>
		<div class="col-xs-6 col-sm-4 col-md-3">
			<div class="dato">
				<h4>Institución:</h4>
				<p><?php echo $datos['institucion'];?></p>
			</div>
		</div>
		<div class="col-xs-6 col-sm-4 col-md-3">
			<div class="dato">
				<h4>Rol:</h4>
				<p><?php echo $datos['rol'];?></p>
			</div>
		</div>
		<div class="col-xs-6 col-sm-4 col-md-3">
			<div class="dato">
				<h4>Nombre autorizado 1:</h4>
				<p><?php echo $datos['nombre_aut_1'];?></p>
			</div>
		</div>
		<div class="col-xs-6 col-sm-4 col-md-3">
			<div class="dato">
				<h4>Cédula autorizado 1:</h4>
				<p><?php echo $datos['cedula_aut_1'];?></p>
			</div>
		</div>
		<div class="col-xs-6 col-sm-4 col-md-3">
			<div class="dato">
				<h4>Nombre autorizado 2:</h4>
				<p><?php echo $datos['nombre_aut_2'];?></p>
			</div>
		</div>
		<div class="col-xs-6 col-sm-4 col-md-3">
			<div class="dato">
				<h4>Cédula autorizado 2:</h4>
				<p><?php echo $datos['cedula_aut_2'];?></p>
			</div>
		</div>
		<div class="col-xs-6 col-sm-4 col-md-3">
			<div class="dato <?php if ($datos['procesada'] == 0){
					echo "alert alert-danger";
					} elseif ($datos['procesada'] == 1) {
						echo "alert alert-warning";
					} else {
						echo "alert alert-success";
					}?>">
				<h4>Estado:</h4>
				<p><?php if ($datos['procesada'] == 0){
					echo "Sin procesar";
					} elseif ($datos['procesada'] == 1) {
						echo "Ingresado a Sofya";
					} else {
						echo "Ingresado y notificado";
					}?></p>
			</div>
		</div>
		<div class="col-xs-6 col-sm-4 col-md-3">
			<div class="dato">
				<h4>Aval:</h4>
				<a id="ver-aval">Ver imágen</a>
			</div>
		</div>
	
	</div>

	<div id="modal-aval">
		<i id="cerrar-aval" class="glyphicon glyphicon-remove"></i>
		<img id="imagen-aval" src="../archivos/<?php echo $datos['cedula'] . '/aval_' . $datos['cedula'] . '.jpg';?>">
	</div>
 
<?php require_once 'paginas/footer.php';?>