<?php		
	$pPageIsPublic = true;
	include '_common.php';	
	
	$page_id = 72;
	//$page_id = intval($_GET["id"]);	
	$objProd=new Page();
	if (!$objProd ->loadByKey($objProd ->getIdKey(), intval($page_id))) Tzn::redirect("index.php");
	
	$seo = new stdClass();
	if ($objProd ->seo)
	$seo = json_decode($objProd ->seo);
	if (!$seo ->metaTitle) $seo ->metaTitle =  sprintf("Mudanzas a nivel nacional e internacional | TRANSREFORM SL |Barcelona | Amplia experiencia en este rubro | Equipo altamente capacitado para brindarle el mejor servicio | %s", ($objProd ->title ? strtoupper($objProd ->title) : "..." ));
	
	$_SESSION['vmnu']='empresa';
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
                <li><img src="contenido/img/s_quiienessomos_3.jpg" alt="<?= t('banner_nuestramision_1');?>" /> </li>
            <li><img src="contenido/img/s_quiienessomos_2.jpg" alt="<?= t('banner_nuestramision_2');?>" /> </li>
            </ul>
        </div>
    </div>
    <!-- End of body section HTML codes -->
      
      </div>
      <?php
			$_SESSION['submenu_vmnu']='mision';
			include('mnu_empresa.php');
	  ?>
      <div class="cuadro_cont">
        <div class="title_desc"><?= t('title_mission');?></div>
        <div class="text_descr_cen_ver_2"><?= t('des_mission');?></div>
        <div class="img_desc">
        
        <!--<a href="contenido/img/b_mision.jpg" title="<?= t('title_mission');?>"  class="html5lightbox" data-group=""><img src="contenido/img/b_mision.jpg" alt="<?= t('title_mission');?>" /></a>-->
        
        
         <?php if ($img = $objProd ->gObjImage()) : ?>
            <a href="upload/<?= $img ->target;?>" title="<?= t('title_mission');?>"  class="html5lightbox" data-group="">
                <img src="upload/<?= $img ->target;?>" alt="<?= t('title_mission');?>" />
            </a>
        <?php endif; ?>
        
        </div>       
      </div>
      <div class="clear1"></div>
<?php include('inc_footer.php');?>