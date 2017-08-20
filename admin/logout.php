<?php 
session_start(); 
session_destroy();
$_SESSION['autentificado'] = "";

require_once 'paginas/header.php';
?> 

		Gracias por tu acceso 
		<br> 
		<br> 
		<a href="index.php">Formulario de autentificación</a> 


<?php require_once 'paginas/footer.php'; ?>