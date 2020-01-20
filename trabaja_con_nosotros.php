<?php		
	$pPageIsPublic = true;
	include '_common.php';
	
	//$page_id = intval($_GET["id"]);
	$page_id = 85;	
	$objProd=new Page();
	if (!$objProd ->loadByKey($objProd ->getIdKey(), intval($page_id))) Tzn::redirect("index.php");
	
	$seo = new stdClass();
	if ($objProd ->seo)
	$seo = json_decode($objProd ->seo);
	if (!$seo ->metaTitle) $seo ->metaTitle =  sprintf("Mudanzas a nivel nacional e internacional | TRANSREFORM SL |Barcelona | Amplia experiencia en este rubro | Equipo altamente capacitado para brindarle el mejor servicio | %s", ($objProd ->title ? strtoupper($objProd ->title) : "..." ));
	
	$_SESSION['vmnu']='';
	include('inc_header.php');
?>
<link rel="stylesheet" type="text/css" href="contenido/slider/sliderengine/amazingslider-3.css">
<script src="contenido/slider/sliderengine/initslider-3.js"></script>
<div class="full_int">
  <div class="cent_cuad">
    <div class="slider_int"> 
      <!-- Insert to your webpage where you want to display the slider -->
      <div id="amazingslider-wrapper-3" style="display:block;position:relative;max-width:990px;margin:0px auto 56px;">
        <div id="amazingslider-3" style="display:block;position:relative;margin:0 auto;">
          <ul class="amazingslider-slides" style="display:none;">
            <li><img src="contenido/img/s_trabajaconnosotros.jpg" alt="<?= t('banner_trabaja_1');?>" /> </li>
            <li><img src="contenido/img/s_trabajaconnosotros_2.jpg" alt="<?= t('banner_trabaja_2');?>" /> </li>
          </ul>
        </div>
      </div>
      <!-- End of body section HTML codes --> 
    </div>
    <?php
			$_SESSION['submenu_vmnu']='trabajaconnostros';
			include('mnu_trabajaconnos.php');
	  ?>
    <div class="cuadro_cont">
      <div class="title_desc">
        <?= t('title_trabaja_nosotros2');?>
      </div>
      <div class="img_desc">
      
      <!--<a href="contenido/img/b_contacto.jpg" title="<?= t('title_trabaja_nosotros2');?>"  class="html5lightbox" data-group=""><img src="contenido/img/b_trabajaconnosotros.jpg" alt="<?= t('title_trabaja_nosotros2');?>" /></a>-->
      
      <?php if ($img = $objProd ->gObjImage()) : ?>
            <a href="upload/<?= $img ->target;?>" title="<?= t('title_trabaja_nosotros2');?>"  class="html5lightbox" data-group="">
                <img src="upload/<?= $img ->target;?>" alt="<?= t('title_trabaja_nosotros2');?>" />
            </a>
        <?php endif; ?>
      
      </div>
      <div class="text_descr">
        <?= t('des_trabaja_nosotros');?>
        <?php
			if ($_POST){
				
				$bHayFicheros = 0; 
				$sCabeceraTexto = ""; 
				$sAdjuntos = ""; 
				$sCuerpo = "Los datos del postulante son :\n";
				$sSeparador = uniqid("_Separador-de-datos_"); 
				 
				$sCabeceras = "From: TRANS-REFORM SL; <informes@transreformsl.com>\r\n";
				//$sCabeceras = "From: TRANS-REFORM SL; <rnunez@hotmail.com>\r\n";
				$sCabeceras .= "MIME-Version: 1.0\r\n";						
				
				$Nombre = strip_tags($_POST['nombre']);
				$Email = strip_tags($_POST['email']);
				$Telefono = strip_tags($_POST['telefono']);
				
				$sCuerpo = $sCuerpo."\nNombres y Apellidos : ".$Nombre."\n";
				$sCuerpo .= "Email : ".$Email."\n";
				$sCuerpo .= "Teléfono : ".$Telefono."\n";
									
				// Recorremos los Ficheros 
				foreach ($_FILES as $vAdjunto) 
				{ 
					 
					if ($bHayFicheros == 0) 
					{ 						 
						// Hay ficheros						 
						$bHayFicheros = 1; 
						 
						// Cabeceras generales del mail
						$sCabeceras .= "Content-type: multipart/mixed;";
						$sCabeceras .= "boundary=\"".$sSeparador."\"\n";
						 
						// Cabeceras del texto 
						$sCabeceraTexto = "--".$sSeparador."\n"; 
						$sCabeceraTexto .= "Content-type: text/plain;charset=UTF-8\n";
						$sCabeceraTexto .= "Content-transfer-encoding: 7BIT\n\n";
						 
						$sCuerpo = $sCabeceraTexto.$sCuerpo;						 
					} 
					 
					// Se añade el fichero 
					if ($vAdjunto["size"] > 0)
					{ 
						$sAdjuntos .= "\n\n--".$sSeparador."\n"; 
						$sAdjuntos .= "Content-type: ".$vAdjunto["type"].";name=\"".$vAdjunto["name"]."\"\n"; 
						$sAdjuntos .= "Content-Transfer-Encoding: BASE64\n"; 
						$sAdjuntos .= "Content-disposition: attachment;filename=\"".$vAdjunto["name"]."\"\n\n";                  
						 
						$oFichero = fopen($vAdjunto["tmp_name"], 'rb'); 
						$sContenido = fread($oFichero, filesize($vAdjunto["tmp_name"]));
						$sAdjuntos .= chunk_split(base64_encode($sContenido)); 
						fclose($oFichero); 
					} 
					 
				} 
						 
				// Si hay ficheros se añaden al cuerpo 
				if ($bHayFicheros) 
					$sCuerpo .= $sAdjuntos."\n\n--".$sSeparador."--\n"; 
				
				// SEND MAIL
				$success = mail("informes@transreformsl.com", "Formulario | ".t('title_trabaja_nosotros')."" , $sCuerpo, $sCabeceras);
				//$success = mail("rnunez@hotmail.com", "Formulario | ".t('title_trabaja_nosotros')."" , $sCuerpo, $sCabeceras);
				
				if ($success){
				  echo '<p class="yay"><a href="trabaja_con_nosotros.php">'.t("t_for_OK").'</a></p>';
				}
				else{
				  echo '<p class="oops"><a href="trabaja_con_nosotros.php">'.t("t_for_ERROR").'</a></p>';
				}
			}else {
		?>
        <div class="clear"></div>
        <form accept-charset="utf-8" action="<?php echo $_SERVER['PHP_SELF']; ?>" enctype="multipart/form-data" id="contact" name="contact" method="post">
          <fieldset>
            <input class="caj1" id="nombre" type="text" placeholder="<?= t('t_for_nombres').' '.t('t_for_apellidos');?>" name="nombre" data-name="nombre" required="required"/>
            <div class="clear1"></div>
            <input class="caj1" id="email" type="email" placeholder="<?= t('t_for_email');?>" name="email" data-name="email" required="required">
            <div class="clear1"></div>
            <input type="text" id="telefono" name="telefono" class="caj1" placeholder="<?= t('t_for_telefono');?>"/>
            <div class="clear11"></div>
            <label>
              <?= t('t_for_adjuntar');?>
            </label>
            <input type="file" id="fileCV" name="fileCV" placeholder="" data-name="fileCV" required="required"/>
            <div class="clear11"></div>
            <button type="submit" id="send" name="send" class="bt_form">
            <?= t('t_for_enviar');?>
            </button>
            <button type="reset" id="" name="" class="bt_form">
            <?= t('t_for_limpiar');?>
            </button>
            <div class="clear11"></div>
          </fieldset>
        </form>
        <?php } ?>
      </div>
    </div>
    <div class="clear1"></div>
    <?php include('inc_footer.php');?>