<?php
$pPageIsPublic = true;
include '_common.php';
//header('Access-Control-Allow-Origin: *');
    
$emailFrom = "a.marinos@evolucionmedia.pe";
$emailTo = "a.marinos@evolucionmedia.pe";
// $emailFrom = "info@servimoving.com";
// $emailTo = "info@servimoving.com";
$subject = "FORMULARIO DE SOLICITAR PRESUPUESTO TRANSREFORM";

// Datos personales del Cliente
$nombres = strip_tags($_POST['Nombre']);
$apellidos = strip_tags($_POST['Apellidos']);
$email = strip_tags($_POST['Email']);
$telefono = strip_tags($_POST['Telefono']);
$movil = strip_tags($_POST['Movil']);
$tipo_servicio = strip_tags($_POST['tipo_servicio']);
$fecha_deseada_mudanza = strip_tags($_POST['fecha_deseada_mudanza']);
$Comonosconocio = strip_tags($_POST['Comonosconocio']);

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

$body = "Nombres: ".$nombres."\n";								
$body .= "Apellidos: ".$apellidos."\n";
$body .= "E-mail: ".$email."\n";
$body .= "Teléfono: ".$telefono."\n";
$body .= "Movil: ".$movil."\n";
$body .= "Tipo de Servicio: ".$tipo_servicio."\n";
$body .= "Fecha deseada para el Servicio: ".$fecha_deseada_mudanza."\n\n";
$body .= "¿Cómo nos conoció?: ".$Comonosconocio."\n";

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

$headers = "From: ".$emailFrom."\n";
$headers .= "Reply-To:".$email."\n";	

$envio = mail($emailTo, $subject, $body, $headers);

if($envio){
    $miresultado = '
    <h2 class="alert alert-success centrar">'.t('mensaje_title_bien').'</h2>
    <h4 class="title-message">'.t('mensaje_texto_bien2').'</h4>
    <a href="index" class="button__cancelar primary-button btn-preguntas btn-form">'.t('mensaje_btn_bien').'</a>';
}else{
    $miresultado = '
    <h2  class="alert alert-danger centrar">'.t('mensaje_title_error').'</h2>
    <h4 class="title-message">'.t('mensaje_texto_error2').'</h4>
    <a href="index" class="button__cancelar primary-button btn-preguntas btn-form">'.t('mensaje_btn_bien').'</a>';
}
echo $miresultado;
?>