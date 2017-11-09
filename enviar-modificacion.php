<?php 
header('Content-Type: text/html; charset=UTF-8');
date_default_timezone_set("America/Montevideo");

/// RECUPERAR DATOS DE FORMULARIO
// Datos personales del titular
$cedula = $_POST['cedula'];
$telefono = $_POST['telefono'];
$celular = $_POST['celular'];
$domicilio = addslashes($_POST['domicilio']);
$departamento = $_POST['departamento'];
$ciudad = $_POST['ciudad'];
$razonSocial = addslashes($_POST['razonSocial']);
$rut = $_POST['rut'];
$email = $_POST['email'];
$ingreso = date("d/m/Y") . ' - ' . date("h:i:sa");
$ingreso_unix = time();


// Datos de Autorizados:
$nombreAut1 = addslashes($_POST['nombreAut1']);
$cedulaAut1 = $_POST['cedulaAut1'];
$nombreAut2 = addslashes($_POST['nombreAut2']);
$cedulaAut2 = $_POST['cedulaAut2'];
        
// DATOS PARA EL MAIL
// Para el envio en formato html
$headers = "MIME-Version: 1.0\r\n";
$headers .= "Content-type: text/html; charset=utf-8\r\n";
// Direccion del remitente
$headers .= "From: Beauty Card <web@beautycard.com.uy>\r\n";
// Direccion de respuesta
$headers .= "Reply-To: web@casani.com.uy\r\n";

$destinatario = "ignacio@casani.com.uy";
$asunto = "Modificación de Datos del cliente: " . $cedula;
$mensaje = "
<html>
    <head>
    <title>Modificación de Datos de Cliente Beauty Card</title>
    </head>
    <body>
        <div>
            <h1>DATOS A ACTUALIZAR</h1>
            <p><strong>Cedula: " . $cedula . "</strong></p>
            <p>Teléfono: " . $telefono . "</p>
            <p>Celular: " . $celular . "</p>
            <p>Domicilio: " . $domicilio . "</p>
            <p>Ciudad: " . $ciudad . "</p>
            <p>Departamento: " . $departamento . "</p>
            <p>Email: " . $email . "</p>
            <p>Razón social: " . $razonSocial . "</p>
            <p>R.U.T.: " . $rut . "</p>
            <h1>NOMBRES DE AUTORIZADOS</h1>
            <p>Nombre autorizado 1: " . $nombreAut1 . "</p>
            <p>Cédula autorizado 1: " . $cedulaAut1 . "</p>
            <p>Nombre autorizado 2: " . $nombreAut2 . "</p>
            <p>Cédula autorizado 2: " . $cedulaAut2 . "</p>
            <h1>CEDULA:</h1>
            <img alt='aval' src='http://www.beautycard.com.uy/beauty_dev/archivos/modificaciones/" . $cedula . "/cedula_" . $cedula . ".jpg'/>
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
mysqli_set_charset($conexion, "utf8");

// Revisa si la conexion es correcta
if (mysqli_connect_errno($conexion)) {
	echo "Error en la conexion a base de datos: " . mysqli_connect_error();
	}

               
// Graba en la base de datos
    $sql = "INSERT INTO modificaciones (f_ingreso_unix, f_ingreso, cedula, telefono, celular, domicilio, departamento, ciudad, razon_social, rut, email, nombre_aut_1, cedula_aut_1, nombre_aut_2, cedula_aut_2, procesada) VALUES ('$ingreso_unix', '$ingreso', '$cedula', '$telefono', '$celular', '$domicilio', '$departamento', '$ciudad', '$razonSocial', '$rut', '$email', '$nombreAut1', '$cedulaAut1', '$nombreAut2', '$cedulaAut2', '0')";

                if (mysqli_query($conexion, $sql)) {
                                
                                // Envía email a administrador
                                mail($destinatario, $asunto, $mensaje, $headers);
                                // Crea el directiorio
                                if (!file_exists($_SERVER['DOCUMENT_ROOT'] . "/beauty/archivos/modificaciones/" . $cedula . "/")) {
                                    mkdir($_SERVER['DOCUMENT_ROOT'] . "/beauty/archivos/modificaciones/" . $cedula . "/", 0777);
                                }

                                // Procesa el fichero de imagen cedula:
                                $codigo_cedula = $_POST['imagen_cedula'];
                                $divide_cedula = explode(",", $codigo_cedula);
                                $codigoLimpio_cedula = base64_decode($divide_cedula[1]);
                                $path_cedula = $_SERVER['DOCUMENT_ROOT'] . "/beauty/archivos/modificaciones/" . $cedula . "/cedula_" . $cedula . ".jpg";
                                //Graba
                                file_put_contents($path_cedula, $codigoLimpio_cedula);

                                echo "Modificación enviada correctamente";
                                    } else {
                                        die("Error: " . $sql . mysqli_error($conexion));
                                            }

                    

// Cierra conexion
mysqli_close($conexion);
?>