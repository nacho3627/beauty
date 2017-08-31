<?php
require_once 'auth-virtual.php';
require_once 'paginas/header.php';

//conectar a base de datos
require_once 'conexion.php';

//Ejecutamos la sentencia SQL
$result = mysqli_query($conn, "SELECT * FROM clientes WHERE procesada = 1");
$num_registros = mysqli_num_rows($result);

//Limito las entradas que muestro por pagina
$tamano_pagina = 11;

//Examino en que pagina estoy y el inicio del registro a mostrar
$pagina = $_GET["pag"] ?? '';
if (!$pagina) {
	$inicio = 0;
	$pagina = 1;
} else {
	$inicio = ($pagina - 1) * $tamano_pagina;
}

//Calculo el total de paginas
$total_paginas = ceil($num_registros / $tamano_pagina);

//Ejecutamos la query de acuerdo a la pagina que estoy
$result = mysqli_query($conn, "SELECT * FROM clientes WHERE procesada = 1 ORDER BY id DESC LIMIT " . $inicio . "," . $tamano_pagina);
?>

<div class="row">
	<div class="col-md-4">
		<input class="form-control" id="buscar" type="text" name="buscar" placeholder="Buscar">
	</div>
	<div class="col-md-8">
		<h2 class="text-left">Gestión de clientes <small>(Virtual) <a href="logout.php">Salir</a></small></h2>
	</div>
</div>
<table class="tg" style="table-layout: fixed;">
<colgroup>
<col style="width: 36px">
<col style="width: 225px">
<col style="width: 84px">
<col style="width: 84px">
<col style="width: 83px">
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
    <th>Ciudad</th>
    <th>Email</th>
    <th class="procesada">Pro</th>
    <th>Acciones</th>
  </tr>
</table>
<div class="tabla">
<table class="tg" style="table-layout: fixed;">
<colgroup>
<col style="width: 36px">
<col style="width: 225px">
<col style="width: 84px">
<col style="width: 84px">
<col style="width: 83px">
<col style="width: 70px">
<col style="width: 180px">
<col style="width: 40px">
<col style="width: 70px">
</colgroup>
  <?php //Mostramos los registros
	while ($row = mysqli_fetch_array ($result)) {
		if ($row["procesada"] == 1) {
		$estado = "Sofya";
	}
	echo '<tr class="' . $estado . '">';
	echo '<td>' . $row["id"] . '</td>';
	echo '<td>' . $row["nombre"] . '</td>';
	echo '<td>' . $row["cedula"] . '</td>';
	echo '<td>' . $row["celular"] . '</td>';
	echo '<td>' . $row["telefono"] . '</td>';
	echo '<td>' . $row["ciudad"] . '</td>';
	echo '<td>' . $row["email"] . '</td>';
	echo '<td>' . $estado . '</td>';
	echo '<td><a href="ampliar.php?id=' . $row["id"] . '"><i class="glyphicon glyphicon-search"></i></a><a href="procesar.php?id=' . $row["id"] . '"><i class="glyphicon glyphicon-ok"></i></a></td></tr>';
	}
  ?>
</table>
</div>
<span>
<?php 
	//Mostrar paginacion
	if ($total_paginas > 1) {
		if ($pagina != 1) {
			echo '<a href="gestion-virtual.php?pag=' . ($pagina - 1) . '">< </a>';
		}
		//Muestro paginas
		for ($i=1 ; $i <= $total_paginas ; $i++) {
			if ($pagina == $i) {
			echo $pagina . ' ';
			} else {
				echo '<a href="gestion-virtual.php?pag=' . $i . '">' . $i . ' </a>';
			}
		}
		if ($pagina != $total_paginas) {
			echo '<a href="gestion-virtual.php?pag=' . ($pagina + 1) . '">></a>';
		}
	}

	mysqli_free_result ($result);
	mysqli_close($conn);
?>
</span>


<?php require_once 'paginas/footer.php';?>
<style type="text/css">footer {display: none;}</style>