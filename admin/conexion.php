<?php
//conecto con la base de datos 
$servidor = "localhost";
$user_db = "admin2051";
$pass_db = "beauty123";
$nombre_db = "beauty_sitio";
$conn = mysqli_connect($servidor, $user_db, $pass_db, $nombre_db);
mysqli_set_charset($conn, "utf8");

//Funciones
function base64url_encode($data) { 
  return rtrim(strtr(base64_encode($data), '+/', '-_'), '='); 
} 

function base64url_decode($data) { 
  return base64_decode(str_pad(strtr($data, '-_', '+/'), strlen($data) % 4, '=', STR_PAD_RIGHT)); 
} 

?>