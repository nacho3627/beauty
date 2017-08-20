<?php 
	header('Content-Type: text/html; charset=UTF-8');

	 // Pequeña lógica para capturar la pagina que queremos abrir
    $pagina = isset($_GET['p']) ? strtolower($_GET['p']) : 'login';


	require_once 'paginas/header.php';

    /* Estamos considerando que el parámetro enviando tiene el mismo nombre del archivo a cargar, si este no fuera así
    se produciría un error de archivo no encontrado */
        switch ($pagina) {
        case 'login':
            require_once 'paginas/login.php';
            break;
        
        case 'gestion':
            require_once 'paginas/gestion.php';
            break;

        case 'gestion-admin':
            require_once 'paginas/gestion-admin.php';
            break;
            
        case 'gestion-virtual':
            require_once 'paginas/gestion-virtual.php';
            break;        

        default:
            require_once 'paginas/login.php';
            break;
    }


	require_once 'paginas/footer.php';

?>