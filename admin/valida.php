<?php 
ini_set("session.use_only_cookies","1"); 
ini_set("session.use_trans_sid","0"); 

header('Content-Type: text/html; charset=UTF-8');

$usuario = $_POST['usuario'];
$contrasena = $_POST['contrasena'];

require_once 'conexion.php';

//Sentencia SQL para buscar un usuario con esos datos 
$ssql = "SELECT * FROM usuarios WHERE usuario = '$usuario' and password = '$contrasena'"; 

//Ejecuto la sentencia 
$rs = mysqli_query($conn, $ssql); 
$user = mysqli_fetch_array($rs);

//vemos si el usuario y contraseña es váildo 
//si la ejecución de la sentencia SQL nos da algún resultado 
//es que si que existe esa conbinación usuario/contraseña 
if (mysqli_num_rows($rs) == 1) { 
      //usuario y contraseña válidos 
      //chequeo tipo de usuario
      switch ($user['seccion']) {
         case 'super':
            session_set_cookie_params(0, '/', $_SERVER['HTTP_HOST'], 0);
            session_start();
            $_SESSION["autentificado"] = "super";
            $_SESSION["ultimo_acceso"] = date("Y-n-j H:i:s");
            header ("Location: gestion.php");
            break;

         case 'admin':
            session_set_cookie_params(0, '/', $_SERVER['HTTP_HOST'], 0);
            session_start();
            $_SESSION["autentificado"] = "admin";
            $_SESSION["ultimo_acceso"] = date("Y-n-j H:i:s");
            header ("Location: gestion-admin.php");
            break;
         
         case 'virtual':
            session_set_cookie_params(0, '/', $_SERVER['HTTP_HOST'], 0);
            session_start();
            $_SESSION["autentificado"] = "virtual";
            $_SESSION["ultimo_acceso"] = date("Y-n-j H:i:s");
            header ("Location: gestion-virtual.php");
            break;
      } 
      
} else { 
      //si no existe le mando otra vez a la portada 
      header("Location: index.php?errorusuario=si"); 
} 
mysqli_free_result($rs); 
mysqli_close($conn); 

?>