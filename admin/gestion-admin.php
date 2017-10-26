<?php
require_once 'auth-admin.php';
require_once 'paginas/header.php';

//conectar a base de datos
require_once 'conexion.php';

//Ejecutamos la sentencia SQL
$result = mysqli_query($conn, "SELECT * FROM clientes WHERE procesada = 0");
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
$result = mysqli_query($conn, "SELECT * FROM clientes WHERE procesada = 0 ORDER BY id DESC LIMIT " . $inicio . "," . $tamano_pagina);
?>

<div class="row">
	<div class="col-md-4">
		<input class="form-control" id="buscar" type="text" name="buscar" placeholder="Buscar">
	</div>
	<div class="col-md-8">
		<h2 class="text-left">Gestión de clientes <small>(Adm. Ventas) <a href="logout.php">Salir</a></small></h2>
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
<col style="width: 80px">
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
<col style="width: 80px">
</colgroup>
  <?php //Mostramos los registros
	while ($row = mysqli_fetch_array ($result)) {
		if ($row["procesada"] == 0) {
		$estado = "No";
	}
	echo '<tr class="' . $estado . '">';
	echo '<td>' . $row["id"] . '</td>';
	echo '<td>' . $row["nombre"] . '</td>';
	echo '<td>' . $row["cedula"] . '</td>';
	echo '<td>' . $row["celular"] . '</td>';
	echo '<td>' . $row["telefono"] . '</td>';
	echo '<td>' . $row["ciudad"] . '</td>';
	echo '<td>' . $row["email"] . '</td>';
	echo '<td>' . ($row["procesada"] == 1 ? 'Si' : 'No') . '</td>';
	echo '<td><a id="pdf" href="pdf.php?id=' . $row["id"] . '&c=' . base64url_encode($row["cedula"]) . '"><i class="glyphicon glyphicon-save-file"></i></a><a href="ampliar.php?id=' . $row["id"] . '"><i class="glyphicon glyphicon-search"></i></a><a href="procesar.php?id=' . $row["id"] . '"><i class="glyphicon glyphicon-ok"></i></a><a id="borrar" href="eliminar.php?id=' . $row["id"] . '"><i class="glyphicon glyphicon-trash"></i></a></td></tr>';
	}

  ?>
</table>
</div>

<div id="paginador">
<?php 
	// Numero de paginas a mostrar 
	$num_paginas = 10; 
	
	//limitando las paginas mostradas 
	$pagina_intervalo = ceil($num_paginas / 2) - 1; 

	// Calculamos desde que numero de pagina se mostrara 
	$pagina_desde = $pagina - $pagina_intervalo; 
	$pagina_hasta = $pagina + $pagina_intervalo; 

	// Verificar que pagina_desde sea negativo 
	if ($pagina_desde < 1) {
		// le sumamos la cantidad sobrante para mantener el numero de enlaces mostrados
		$pagina_hasta += (1 - $pagina_desde);
		$pagina_desde = 1;
		}

	// Verificar que pagina_hasta no sea mayor que paginas_totales
	if ($pagina_hasta > $total_paginas) { 
		$pagina_desde -= ($pagina_hasta - $total_paginas); 
		$pagina_hasta = $total_paginas; 
		if ($pagina_desde < 1) { 
			$pagina_desde = 1; 
		} 
	} 



	//Mostrar paginacion
	if ($total_paginas > 1) {
		echo '<div class="pag"><a href="gestion-admin.php?pag=1"><<</a></div>';
		if ($pagina != 1) {
			echo '<div class="pag"><a href="gestion-admin.php?pag=' . ($pagina - 1) . '"><</a></div>';
		}
		//Muestro paginas
		for ($i = $pagina_desde; $i <= $pagina_hasta; $i++) {
			if ($pagina == $i) {
			echo '<div class="pag">' . $pagina . '</div>';
			} else {
				echo '<div class="pag"><a href="gestion-admin.php?pag=' . $i . '">' . $i . ' </a></div>';
			}
		}
		if ($pagina != $total_paginas) {
			echo '<div class="pag"><a href="gestion-admin.php?pag=' . ($pagina + 1) . '">></a></div>';
		}
		echo '<div class="pag"><a href="gestion-admin.php?pag=' . $total_paginas . '">>></a></div>';
	}

	mysqli_free_result ($result);
	mysqli_close($conn);
?>
</div>

<?php require_once 'paginas/footer.php';?>
<style type="text/css">footer {display: none;}</style>