<?php
$pPageIsPublic = true;
include '_common.php';

//$emailFrom = "p.sanchezflores@transreformsl.com";
//$emailTo = "p.sanchezflores@transreformsl.com";

$emailFrom = "p.sanchezflores@transreformsl.com";
$emailTo = "p.sanchezflores@transreformsl.com";	

$subject = "FORMULARIO DE CONTACTO TRANSREFORMSL";

$nombres = strip_tags($_POST['Nombre']);
$empresa = strip_tags($_POST['Empresa']);
$email = strip_tags($_POST['Email']);
$telefono = strip_tags($_POST['Telefono']);
$mensaje = strip_tags($_POST['Mensaje']);

$body = "Nombres: ".$nombres."\n";								
$body .= "Empresa: ".$empresa."\n";
$body .= "E-mail: ".$email."\n";
$body .= "Teléfono: ".$telefono."\n";
$body .= "Mensaje: ".$mensaje."\n";

$headers = "From: ".$emailFrom."\n";
$headers .= "Reply-To:".$email."\n";	

$envio = mail($emailTo, $subject, $body, $headers);

if($envio){
    $miresultado ='<p class="feedback yay"><a href="contacto.php" class="menu_arriba">'.t("t_for_OK").'</a></p>';   
}else{
    $miresultado = '<p class="feedback oops"><a href="contacto.php" class="menu_arriba">'.t("t_for_ERROR").'</a></p>';
}
echo $miresultado;
?>