<?php
$pPageIsPublic = true;
include '_common.php';
//header('Access-Control-Allow-Origin: *');

$emailFrom = "p.sanchezflores@transreformsl.com";
$emailTo = "p.sanchezflores@transreformsl.com";
// $emailFrom = "a.marinos@evolucionmedia.pe";
// $emailTo = "a.marinos@evolucionmedia.pe";
$subject = " | FORMULARIO DE PRESUPUESTO TRANSREFORMSL";

/*DATOS BASICOS*/
$nombre = strip_tags($_POST['nombre']);
$apellidos = strip_tags($_POST['apellidos']);
$telefono = strip_tags($_POST['telefono']);
$Email = strip_tags($_POST['Email']);
$tipo_servicio = strip_tags($_POST['tipo_servicio']);
$fecha_deseada_mudanza = strip_tags($_POST['fecha_deseada_mudanza']);

/*DATOS ORIGEN*/
$provincia_origen = strip_tags($_POST['provincia_origen']);
$poblacion_origen = strip_tags($_POST['poblacion_origen']);
$direccion_origen = strip_tags($_POST['direccion_origen']);
$cod_postal_origen = strip_tags($_POST['cod_postal_origen']);
$piso_origen = strip_tags($_POST['piso_origen']);
$ascensor_origen = strip_tags($_POST['ascensor_origen']);

/*DATOS DESTINO*/
$provincia_destino = strip_tags($_POST['provincia_destino']);
$poblacion_destino = strip_tags($_POST['poblacion_destino']);
$direccion_destino = strip_tags($_POST['direccion_destino']);
$cod_postal_destino = strip_tags($_POST['cod_postal_destino']);
$piso_destino = strip_tags($_POST['piso_destino']);
$ascensor_destino = strip_tags($_POST['ascensor_destino']);

/*DATOS EXTRAS*/
$Comonosconocio = strip_tags($_POST['Comonosconocio']);
$Mensaje = strip_tags($_POST['Mensaje']);

/*----------------------------------------------*/

$body = "Nombres : " . $nombre . "\n";
$body .= "Apellidos : " . $apellidos . "\n";
$body .= "Teléfono : " . $telefono . "\n";
$body .= "Email : " . $Email . "\n";
$body .= "Tipo de Servicio : " . $tipo_servicio . "\n";
$body .= "Fecha deseada de Mudanza : " . $fecha_deseada_mudanza . "\n\n";

/*DATOS ORIGEN*/
$body .= "DATOS DE ORIGEN \n";
$body .= "-------------------------------------------------------------- \n";
$body .= "Provincia : " . $provincia_origen . "\n";
$body .= "Población : " . $poblacion_origen . "\n";
$body .= "Dirección : " . $direccion_origen . "\n";
$body .= "Cod-Postal : " . $cod_postal_origen . "\n";
$body .= "Piso : " . $piso_origen . "\n";
$body .= "Ascensor : " . $ascensor_origen . "\n\n";

/*DATOS DESTINO*/
$body .= "DATOS DE DESTINO \n";
$body .= "-------------------------------------------------------------- \n";
$body .= "Provincia : " . $provincia_destino . "\n";
$body .= "Población : " . $poblacion_destino . "\n";
$body .= "Dirección : " . $direccion_destino . "\n";
$body .= "Cod-Postal : " . $cod_postal_destino . "\n";
$body .= "Piso : " . $piso_destino . "\n";
$body .= "Ascensor : " . $ascensor_destino . "\n\n";

/*DATOS EXTRAS*/
$body .= "Como nos conocio : " . $Comonosconocio . "\n";
$body .= "Mensaje : " . $Mensaje . "\n";

$headers = "From: " . $emailFrom . "\n";
$headers .= "Reply-To:" . $email . "\n";
$envio = mail($emailTo, $subject, $body, $headers);

if ($envio) {
    $miresultado = '
    <h2 class="alert alert-success centrar">' . "¡Bien hecho!" . '</h2>
    <h4 class="title-message">' . "El correo ha sido enviado! Gracias por ponerse en contacto con nosotros." . '</h4>
    <a href="index.php" class="button__cancelar primary-button btn-preguntas btn-form">' . "Aceptar" . '</a>';
} else {
    $miresultado = '
    <h2  class="alert alert-danger centrar">' . "Error" . '</h2>
    <h4 class="title-message">' . "No se envió el correo. Por favor trate de comunicarse por otro medio." . '</h4>
    <a href="index.php" class="button__cancelar primary-button btn-preguntas btn-form">' . "Aceptar" . '</a>';
}
echo $miresultado;
?>
