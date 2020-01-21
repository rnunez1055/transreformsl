<?php
$pPageIsPublic = true;
include '_common.php';
//header('Access-Control-Allow-Origin: *');

// $emailFrom = "a.marinos@evolucionmedia.pe";
// $emailTo = "a.marinos@evolucionmedia.pe";
$emailFrom = "p.sanchezflores@transreformsl.com";
$emailTo = "p.sanchezflores@transreformsl.com";
$subject = "FORMULARIO DE SOLICITAR PRESUPUESTO TRANSREFORM";

// Datos personales del Cliente
$nombres_p = strip_tags($_POST['nombres_p']);
$apellidos_p = strip_tags($_POST['apellidos_p']);
$email_p = strip_tags($_POST['email_p']);
$telefono_p = strip_tags($_POST['telefono_p']);
$movil_p = strip_tags($_POST['movil_p']);
$tipo_servicio_p = strip_tags($_POST['tipo_servicio_p']);
$fecha_deseada_mudanza_p = strip_tags($_POST['fecha_deseada_mudanza_p']);
$Comonosconocio_p = strip_tags($_POST['Comonosconocio_p']);

//Cuidad de Origen
/*$provincia_origen = strip_tags($_POST['provincia_origen']);
$poblacion_origen = strip_tags($_POST['poblacion_origen']);
$direccion_origen = strip_tags($_POST['direccion_origen']);
$cod_postal_origen = strip_tags($_POST['cod_postal_origen']);
$piso_origen = strip_tags($_POST['piso_origen']);
$ascensor_origen = strip_tags($_POST['ascensor_origen']);*/

//Cuidad de Destino
/*$provincia_destino = strip_tags($_POST['provincia_destino']);
$poblacion_destino = strip_tags($_POST['poblacion_destino']);
$direccion_destino = strip_tags($_POST['direccion_destino']);
$cod_postal_destino = strip_tags($_POST['cod_postal_destino']);
$piso_destino = strip_tags($_POST['piso_destino']);
$ascensor_destino = strip_tags($_POST['ascensor_destino']);*/

//$mensaje = strip_tags($_POST['Mensaje']);

$body = "Nombres: " . $nombres_p . "\n";
$body .= "Apellidos: " . $apellidos_p . "\n";
$body .= "E-mail: " . $email_p . "\n";
$body .= "Teléfono: " . $telefono_p . "\n";
$body .= "Movil: " . $movil_p . "\n";
$body .= "Tipo de Servicio: " . $tipo_servicio_p . "\n";
$body .= "Fecha deseada para el Servicio: " . $fecha_deseada_mudanza_p . "\n\n";
$body .= "¿Cómo nos conoció?: " . $Comonosconocio_p . "\n";

/*$body .= "CUIDAD DE ORIGEN \n";
$body .= "Provincia: ".$provincia_origen."\n";
$body .= "Población: ".$poblacion_origen."\n";
$body .= "Dirección de Origen: ".$direccion_origen."\n";
$body .= "Código Postal: ".$cod_postal_origen."\n";
$body .= "Piso: ".$piso_origen."\n";
$body .= "Ascensor: ".$ascensor_origen."\n\n";

$body .= "CUIDAD DE DESTINO \n";
$body .= "Provincia: ".$provincia_destino."\n";
$body .= "Población: ".$poblacion_destino."\n";
$body .= "Dirección de Destino: ".$direccion_destino."\n";
$body .= "Código Postal: ".$cod_postal_destino."\n";
$body .= "Piso: ".$piso_destino."\n";
$body .= "Ascensor: ".$ascensor_destino."\n\n";*/

//$body .= "Mensaje: ".$mensaje."\n";

$headers = "From: " . $emailFrom . "\n";
$headers .= "Reply-To:" . $email . "\n";

$envio = mail($emailTo, $subject, $body, $headers);

if ($envio) {
    $miresultado = '<p class="feedback yay"><a href="presupuesto.php" class="menu_arriba">' . t("t_for_OK") . '</a></p>';
} else {
    $miresultado = '<p class="feedback oops"><a href="presupuesto.php" class="menu_arriba">' . t("t_for_ERROR") . '</a></p>';
}
echo $miresultado;
