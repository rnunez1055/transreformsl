<?php		
	$pPageIsPublic = true;
	include '_common.php';
	
	$page_id = 77;
	//$page_id = intval($_GET["id"]);	
	$objProd=new Page();
	if (!$objProd ->loadByKey($objProd ->getIdKey(), intval($page_id))) Tzn::redirect("index.php");
	
	$seo = new stdClass();
	if ($objProd ->seo)
	$seo = json_decode($objProd ->seo);
	if (!$seo ->metaTitle) $seo ->metaTitle =  sprintf("Mudanzas a nivel nacional e internacional | TRANSREFORM SL |Barcelona | Amplia experiencia en este rubro | Equipo altamente capacitado para brindarle el mejor servicio | %s", ($objProd ->title ? strtoupper($objProd ->title) : "..." ));
	
	$_SESSION['vmnu']='servicios';
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
                <li><img src="contenido/img/s_mudanzas_locales.jpg" alt="<?= t('banner_mudanzaslocales_1');?>" />
                <li><img src="contenido/img/s_mudanzas_locales_2.jpg" alt="<?= t('banner_mudanzaslocales_2');?>" />
                </li>
            </ul>
        </div>
    </div>
    <!-- End of body section HTML codes -->      
      </div>
      <?php
			$_SESSION['submenu_vmnu']='mudanzas_locales';
			include('mnu_servicios.php');
	  ?>
      <div class="cuadro_cont">
        <div class="title_desc"><?= t('titulo_locales_nacionales');?></div>
        <div class="img_desc">
        
        <!--<a href="contenido/img/b_mudanzas_locales.jpg" title="<?= t('titulo_locales_nacionales');?>"  class="html5lightbox" data-group=""><img src="contenido/img/b_mudanzas_locales.jpg" alt="<?= t('titulo_locales_nacionales');?>" /></a>-->
        
        <?php if ($img = $objProd ->gObjImage()) : ?>
            <a href="upload/<?= $img ->target;?>" title="<?= t('titulo_locales_nacionales');?>"  class="html5lightbox" data-group="">
                <img src="upload/<?= $img ->target;?>" alt="<?= t('titulo_locales_nacionales');?>" />
            </a>
        <?php endif; ?>
        
        
        </div>
        <div class="text_descr"><?= t('des1_mudanzas_locales_nacionales');?><br/><br/>
<?= t('des2_mudanzas_locales_nacionales');?>
<br/>
        
           
        
        </div>
       <div class="clear1"></div> 
       <div class="text_descr_2_a">
        <div align="center"><img src="contenido/img/mudanzas_personalizadas.jpg" alt="<?= t('titulo_mudanzas_personalizadas');?>"/></div>
       	<br/>
        <h3 align="center"><?= t('titulo_mudanzas_personalizadas');?></h3>
		<p align="justify"><?= t('des_mudanzas_personalizadas');?></p>

       
       </div>
       <div class="text_descr_2_b">
       <div align="center"><img src="contenido/img/mudanzas_combinadas.jpg" alt="<?= t('titulo_mudanzas_combinadas');?>"/></div>
       <br/>
       <h3 align="center"><?= t('titulo_mudanzas_combinadas');?></h3>
	   <p align="justify"><?= t('des_mudanzas_combinadas');?></p>

       </div>
       <div class="text_descr_2_c">
       <div align="center"><img src="contenido/img/mudanzas_combinadas_economicas.jpg" alt="<?= t('titulo_mudanzas_economicas_combinadas');?>"/></div>
       <br/>
       <h3 align="center"><?= t('titulo_mudanzas_economicas_combinadas');?></h3>
	   <p align="justify"><?= t('des_mudanzas_economicas_combinadas');?></p>
</div>
        <div class="clear1"></div> 
      
       <a href="presupuesto.php" class="bt_solic_pres">
       <?= t('btn_solicitar_pres');?>
       </a>
        
      </div>
      <div class="clear1"></div>
      
<?php include('inc_footer.php');?>