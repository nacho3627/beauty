<?php header('Content-Type: text/html; charset=UTF-8');
date_default_timezone_set("America/Montevideo");
?>
<html>
<head>
    <meta http-equiv="Content-type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Beauty Card</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap-theme.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Merriweather">
    <link rel="stylesheet" href="assets/css/Carousel-Hero.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.8.2/css/lightbox.min.css">
    <link rel="stylesheet" href="assets/css/Lightbox-Gallery.css">
    <link rel="stylesheet" href="assets/css/styles.css">
    <link rel="stylesheet" href="assets/css/transitions.css">
</head>

<body>
    <header>
        <div id="logo" class="col-xs-12 col-sm-12 col-md-12 col-lg-12"><img src="assets/img/assets/logo.png"></div><img class="hidden-xs" src="assets/img/assets/mariposa-04.png" id="mariposa"></header>

<div class="container" id="enviar-solicitud" style="margin-top: 18vh;">

<?php
/// RECUPERAR DATOS DE FORMULARIO
// Datos personales del titular
$nombre = $_POST['nombre'];
$cedula = $_POST['cedula'];
$nacimiento = $_POST['nacimiento'];
$telefono = $_POST['telefono'];
$celular = $_POST['celular'];
$domicilio = $_POST['domicilio'];
$departamento = $_POST['departamento'];
$ciudad = $_POST['ciudad'];
$razonSocial = $_POST['razon-social'];
$rut = $_POST['rut'];
$email = $_POST['email'];
$ingreso = date("d/m/Y") . ' - ' . date("h:i:sa");


// Datos profesionales del titular:
$area = $_POST['area'];
$institucion = $_POST['institucion'];
$rol = $_POST['rol'];

// Datos de Autorizados:
$nombreAut1 = $_POST['nombre-aut-1'];
$cedulaAut1 = $_POST['cedula-aut-1'];
$nombreAut2 = $_POST['nombre-aut-2'];
$cedulaAut2 = $_POST['cedula-aut-2'];

$condiciones = $_POST['condiciones'];

// Datos del archivo 
$nombre_archivo = 'aval.jpg';
$ruta_archivo = "/archivos/" . $cedula . "/" . $nombre_archivo;
        
// DATOS PARA EL MAIL
// Para el envio en formato html
$headers = "MIME-Version: 1.0\r\n";
$headers .= "Content-type: text/html; charset=utf-8\r\n";
// Direccion del remitente
$headers .= "From: Beauty Card <web@beautycard.com.uy>\r\n";
// Direccion de respuesta
$headers .= "Reply-To: web@casani.com.uy\r\n";

$destinatario = "admventas@casani.com.uy";
$asunto = "Nueva solicitud de cliente: " . $nombre;
$mensaje = "
<html>
    <head>
    <title>Nueva solicitud Beauty Card</title>
    </head>
    <body>
        <div>
            <h1>DATOS PERSONALES DEL TITULAR</h1>
            <p>Nombre completo: " . $nombre . "</p>
            <p>Fecha de nacimiento: " . $nacimiento . "</p>
            <p>Cedula: " . $cedula . "</p>
            <p>Teléfono: " . $telefono . "</p>
            <p>Celular: " . $celular . "</p>
            <p>Domicilio: " . $domicilio . "</p>
            <p>Ciudad: " . $ciudad . "</p>
            <p>Departamento: " . $departamento . "</p>
            <p>Email: " . $email . "</p>
            <p>Razón social: " . $razonSocial . "</p>
            <p>R.U.T.: " . $rut . "</p>
            <h1>DATOS PROFESIONALES DEL TITULAR</h1>
            <p>Área: " . $area . "</p>
            <p>Institución: " . $institucion . "</p>
            <p>Rol: " . $rol . "</p>
            <h1>NOMBRES DE AUTORIZADOS</h1>
            <p>Nombre autorizado 1: " . $nombreAut1 . "</p>
            <p>Cédula autorizado 1: " . $cedulaAut1 . "</p>
            <p>Nombre autorizado 2: " . $nombreAut2 . "</p>
            <p>Cédula autorizado 2: " . $cedulaAut2 . "</p>
            <h1>AVAL PROFESIONAL:</h1>
            <img width='800' alt='aval' src='http://www.beautycard.com.uy/archivos/" . $cedula . "/aval.jpg'/>
        </div>
    </body>
</html>
";



/// CONECTA A LA BASE DE DATOS

$servidor = "localhost";
$user_db = "admin2051";
$pass_db = "beauty123";
$nombre_db = "beauty_sitio";
$conexion = mysqli_connect($servidor, $user_db, $pass_db, $nombre_db);

// Revisa si la conexion es correcta
if (mysqli_connect_errno($conexion)) {
	echo "error en la conexion a base de datos: " . mysqli_connect_error() . "<p style='text-align: center;'><a href='http://www.beautycard.com.uy'>Volver al inicio</a></p>";
	}



// Revisa que el cliente no esté registrado
$nuevo_cliente = mysqli_query($conexion, "SELECT cedula FROM clientes WHERE cedula = '$cedula'");

if (mysqli_num_rows($nuevo_cliente) > 0) { 
    echo "<p style='text-align: center;'>Esta cédula ya fue ingresada al sistema por lo tanto ésta solicitud no puede ser procesada. Cualquier duda comunicate con nosotros al 2408 1563.</p> 
          <p style='text-align: center;'><a href='http://www.beautycard.com.uy/tramites-online'>Volver al formulario</a></p>"; 
    } else {
        

        // Procesa el fichero de imagen recibido:
        if (!file_exists($_SERVER['DOCUMENT_ROOT'] . "/beauty" . "/archivos/" . $cedula . "/")) {
            mkdir($_SERVER['DOCUMENT_ROOT']  . "/beauty" . "/archivos/" . $cedula . "/", 0777);
        }
        if (move_uploaded_file($_FILES['fichero-imagen']['tmp_name'], $_SERVER['DOCUMENT_ROOT'] . "/beauty" . $ruta_archivo)){ 
                            //Procesa imagen - comprime
                          //  redimensionar_jpeg($_SERVER['DOCUMENT_ROOT'] . "/beauty" . $ruta_archivo, $_SERVER['DOCUMENT_ROOT']  . "/beauty" . $ruta_archivo . "_comp", 800, 600, 70);

                            // Graba en la base de datos
                            $sql = "INSERT INTO clientes (id, f_ingreso, nombre, cedula, f_nacimiento, telefono, celular, domicilio, departamento, ciudad, razon_social, rut, email, area, institucion, rol, nombre_aut_1, cedula_aut_1, nombre_aut_2, cedula_aut_2) VALUES (NULL, '$ingreso', '$nombre', '$cedula', '$nacimiento', '$telefono', '$celular', '$domicilio', '$departamento', '$ciudad', '$razonSocial', '$rut', '$email', '$area', '$institucion', '$rol', '$nombreAut1', '$cedulaAut1', '$nombreAut2', '$cedulaAut2')";

                            if (mysqli_query($conexion, $sql)) {
                                
                                // Envía email a administrador
                                mail($destinatario, $asunto, $mensaje, $headers);

                                echo "<p style='text-align: center;'>Solicitud enviada correctamente</p>
                                <p style='text-align: center;'><a href='http://www.beautycard.com.uy'>Volver al inicio</a></p>";
                                } else {
                                    echo "Error: " . $sql . "<br>" . mysqli_error($conexion) . "<p style='text-align: center;'><a href='http://www.beautycard.com.uy'>Volver al inicio</a></p>";
                                       }
                    } else { 
                            echo "<p style='text-align: center;'>Ocurrió algún error al subir el fichero. No se pudo continuar con el envío de la solicitud.<br>Comunicarse con <a href='mailto:soporte@casani.com.uy'>soporte@casani.com.uy</a></p><p style='text-align: center;'><a href='http://www.beautycard.com.uy/tramites-online'>Volver al formulario</a></p>"; 
                            } 
                     
        }

// Cierra conexion
mysqli_close($conexion);
?>

</div>

    </div>
    <footer style="position: fixed; bottom: 0px;"><img src="assets/img/assets/logo.png" id="logo-footer"><span>Copyright Casani 2017</span></footer>
   
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="assets/js/bs-animation.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.8.2/js/lightbox.min.js"></script>
</body>

</html>