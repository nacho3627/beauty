<?php
header('Content-Type: text/html; charset=UTF-8');
 // Pequeña lógica para capturar la pagina que queremos abrir
    $pagina = isset($_GET['p']) ? strtolower($_GET['p']) : 'impulsos';


    // El fragmento de html que contiene la cabecera de nuestra web
    require_once 'paginas/header.php';


    /* Estamos considerando que el parámetro enviando tiene el mismo nombre del archivo a cargar, si este no fuera así
    se produciría un error de archivo no encontrado */
        switch ($pagina) {
        case 'impulsos':
            require_once 'paginas/impulsos.php';
            break;
        
        case 'programa-de-beneficios':
            require_once 'paginas/programa-de-beneficios.php';
            break;

        case 'preguntas-frecuentes':
            require_once 'paginas/preguntas-frecuentes.php';
            break;
         
        case 'productos-canjeables':
            require_once 'paginas/productos-canjeables.php';
            break;
            
        case 'tramites-online':
            require_once 'paginas/tramites-online.php';
            break;   

        default:
            require_once 'paginas/impulsos.php';
            break;
    }


    // El fragmento de html que contiene el pie de página de nuestra web
    require_once 'paginas/footer.php';



?>