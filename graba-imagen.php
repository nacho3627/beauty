<?php 

$codigo = $_POST['base64'];

$cedula = $_POST['cedula'];

$divide = explode(",", $codigo);

$codigoLimpio = base64_decode($divide[1]);

$path = "/users/nacho/sites/beauty/prueba/aval_" . $cedula . ".jpg";

file_put_contents($path, $codigoLimpio);

?>