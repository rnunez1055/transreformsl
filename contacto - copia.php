<?php		
	$pPageIsPublic = true;
	include '_common.php';
	
	//$page_id = intval($_GET["id"]);
	$page_id = 84;	
	$objProd=new Page();
	if (!$objProd ->loadByKey($objProd ->getIdKey(), intval($page_id))) Tzn::redirect("index.php");
	
	$seo = new stdClass();
	if ($objProd ->seo)
	$seo = json_decode($objProd ->seo);
	if (!$seo ->metaTitle) $seo ->metaTitle =  sprintf("Mudanzas a nivel nacional e internacional | TRANSREFORM SL |Barcelona | Amplia experiencia en este rubro | Equipo altamente capacitado para brindarle el mejor servicio | %s", ($objProd ->title ? strtoupper($objProd ->title) : "..." ));
	
	$_SESSION['vmnu']='contacto';
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
                <li><img src="contenido/img/s_contacto_1.jpg" alt="<?= t('banner_contacto_1');?>" />
                </li>
                <li><img src="contenido/img/s_contacto.jpg" alt="<?= t('banner_contacto_2');?>" />
                </li>
            </ul>
        </div>
    </div>
    <!-- End of body section HTML codes -->
      </div>
      <?php
			$_SESSION['submenu_vmnu']='contacto';
			include('mnu_contacto.php');
	  ?>
      <div class="cuadro_cont">
        <div class="title_desc"><?= t('title_contacto');?></div>        
        <div class="img_desc">
        
        
        <!--<a href="contenido/img/b_contacto.jpg" title="<?= t('title_contacto');?>"  class="html5lightbox" data-group=""><img src="contenido/img/b_contacto.jpg" alt="<?= t('title_contacto');?>" /></a>-->
        
        <?php if ($img = $objProd ->gObjImage()) : ?>
            <a href="upload/<?= $img ->target;?>" title="<?= t('title_contacto');?>"  class="html5lightbox" data-group="">
                <img src="upload/<?= $img ->target;?>" alt="<?= t('title_contacto');?>" />
            </a>
        <?php endif; ?>
        
        </div>
        <div class="text_descr"><?= t('des_contacto');?>
        
        <?php
			if(isset($_POST['send'])){
				$emailFrom = "p.sanchezflores@transreformsl.com";
				$emailTo = "p.sanchezflores@transreformsl.com";
				$subject = " | FORMULARIO DE CONTACTO";
				
				$Nombre = strip_tags($_POST['Nombre']);
				$Empresa = strip_tags($_POST['Empresa']);
				$Email = strip_tags($_POST['Email']);
				$Telefono = strip_tags($_POST['Telefono']);
				$Mensaje = strip_tags(stripslashes($_POST['Mensaje']));
				
				$body = "Nombres y Apellidos: ".$Nombre."\n";
				$body .= "Empresa: ".$Empresa."\n";
				$body .= "Email: ".$Email."\n";
				$body .= "Teléfono: ".$Telefono."\n";
				$body .= "Mensaje: ".$Mensaje."\n";	
					
				$headers = "From: ".$emailFrom."\n";
				$headers .= "Reply-To:".$email."\n";	
				
				$success = mail($emailTo, $subject, $body, $headers);
				
				if ($success){
				  echo '<p class="feedback yay"><a href="contacto.php" class="menu_arriba">'.t("t_for_OK").'</a></p>';
				}
				else{
				  echo '<p class="feedback oops"><a href="contacto.php" class="menu_arriba">'.t("t_for_ERROR").'</a></p>';
				}
			} else {
			?>
          <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" id="contact" name="contact">
            <fieldset>
              <label class="lb_1"><?= t('t_for_nombres').' '.t('t_for_apellidos');?></label>
              <input class="caj1" id="Nombre" type="text" placeholder="<?= t('t_for_nombres').' '.t('t_for_apellidos');?>" name="Nombre" data-name="Nombre" required="required"/>
              <div class="clear1"></div>
              <label class="lb_1"><?= t('t_for_company');?></label>
              <input class="caj1" id="Empresa" type="text" placeholder="<?= t('t_for_company');?>" name="Empresa" data-name="Empresa" required="required"/>
              <div class="clear1"></div>
              <label class="lb_1"><?= t('t_for_email');?></label>
              <input class="caj1" id="Email" type="email" placeholder="<?= t('t_for_email');?>" name="Email" data-name="Email" required="required"/>
              <div class="clear1"></div>
              <label class="lb_1"><?= t('t_for_telefono');?></label>
              <input class="caj1" id="Telefono" type="text" placeholder="<?= t('t_for_telefono');?>" name="Telefono" data-name="Telefono"/>              
              
              <div class="clear1"></div>
              <label class="lb_1"><?= t('t_for_solicitud');?></label>
              <textarea class="caj2" id="Mensaje" cols="" rows="" placeholder="<?= t('t_for_solicitud');?>" name="Mensaje" data-name="Mensaje" required="required"></textarea>
              <div class="clear1"></div>
              <input class="bt_form" id="send" name="send" type="submit" value="<?= t('t_for_enviar');?>" />
              <input class="bt_form" type="reset" value="<?= t('t_for_limpiar');?>" />
            </fieldset>
          </form>
          <?php } ?>
        </div>
        <div class="text_descr_2">
             <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2993.8775527434914!2d2.1333763152174825!3d41.376744979265155!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x12a49886069d6295%3A0x1a7c9f83596d7451!2sTrans+Reform+S.L!5e0!3m2!1ses-419!2spe!4v1514992127857" width="100%" height="300" class="photo_pdd"></iframe>
        </div>             
      </div>
      <div class="clear1"></div>
<?php include('inc_footer.php');?>