<?php
ini_set("session.use_only_cookies","1"); 
ini_set("session.use_trans_sid","0"); 

//Inicio la sesión 
session_set_cookie_params(0, '/', $_SERVER['HTTP_HOST'], 0);
session_start(); 

//COMPRUEBA QUE EL USUARIO ESTA AUTENTIFICADO 
if ($_SESSION["autentificado"] !== "admin") { 
    //si no existe, envio a la página de autentificacion 
    header("Location: index.php"); 
    //ademas salgo de este script 
    exit(); 
} else {
  $fecha_guardada = $_SESSION["ultimo_acceso"]; 
    $ahora = date("Y-n-j H:i:s"); 
    $tiempo_transcurrido = (strtotime($ahora)-strtotime($fecha_guardada));

    if ($tiempo_transcurrido >= 600) {
      session_destroy();
      header("Location: index.php");
    } else {
      $_SESSION["ultimo_acceso"] = $ahora;
      }
  }
?>