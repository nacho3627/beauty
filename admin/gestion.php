<?php
require_once 'auth-super.php';
require_once 'paginas/header.php';

//conectar a base de datos
require_once 'conexion.php';

//Ejecutamos la sentencia SQL
$result = mysqli_query($conn, "SELECT * FROM clientes ORDER BY id DESC");
?>

<div class="row">
	<div class="col-md-4">
		<input class="form-control" id="buscar" type="text" name="buscar" placeholder="Buscar">
	</div>
	<div class="col-md-8">
		<h2 class="text-left">Gestión de clientes <small>(Super) <a href="logout.php">Salir</a></small></h2>
	</div>
</div>
<table class="tg" style="table-layout: fixed;">
<colgroup>
<col style="width: 30px">
<col>
<col style="width: 70px">
<col style="width: 70px">
<col style="width: 70px">
<col style="width: 150px">
<col style="width: 70px">
<col style="width: 180px">
<col style="width: 40px">
<col style="width: 70px">
</colgroup>
  <tr>
    <th>Id</th>
    <th>Nombre</th>
    <th>Cédula</th>
    <th>Celular</th>
    <th>Teléfono</th>
    <th>Domicilio</th>
    <th>Ciudad</th>
    <th>Email</th>
    <th class="procesada">Pro</th>
    <th>Acciones</th>
  </tr>
  </table>
<div class="tabla">
<table class="tg" style="table-layout: fixed;">
<colgroup>
<col style="width: 30px">
<col>
<col style="width: 70px">
<col style="width: 70px">
<col style="width: 70px">
<col style="width: 150px">
<col style="width: 70px">
<col style="width: 180px">
<col style="width: 40px">
<col style="width: 70px">
</colgroup>
  <?php //Mostramos los registros
	while ($row = mysqli_fetch_array ($result)) {
	if ($row["procesada"] == 0) {
		$estado = "No";
	} elseif ($row["procesada"] == 1) {
		$estado = "Sofya";
	} else {
		$estado = "Si";
	}
	echo '<tr class="' . $estado . '">';
	echo '<td>' . $row["id"] . '</td>';
	echo '<td>' . $row["nombre"] . '</td>';
	echo '<td>' . $row["cedula"] . '</td>';
	echo '<td>' . $row["celular"] . '</td>';
	echo '<td>' . $row["telefono"] . '</td>';
	echo '<td>' . $row["domicilio"] . '</td>';
	echo '<td>' . $row["ciudad"] . '</td>';
	echo '<td>' . $row["email"] . '</td>';
	echo '<td>' . $estado . '</td>';
	echo '<td><a href="ampliar.php?id=' . $row["id"] . '"><i class="glyphicon glyphicon-search"></i></a><a href="modificar.php?id=' . $row["id"] . '"><i class="glyphicon glyphicon-pencil"></i></a><a href="procesar.php?id=' . $row["id"] . '"><i class="glyphicon glyphicon-ok"></i></a><a id="borrar" href="eliminar.php?id=' . $row["id"] . '"><i class="glyphicon glyphicon-trash"></i></a></td></tr>';
	}
	mysqli_free_result ($result);
	mysqli_close($conn);
  ?>
</table>
</div>

<?php require_once 'paginas/footer.php';?>

<style type="text/css">footer {display: none;}</style>