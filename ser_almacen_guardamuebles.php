<?php		
	$pPageIsPublic = true;
	include '_common.php';
	
	$page_id = 83;
	//$page_id = intval($_GET["id"]);	
	$objProd=new Page();
	if (!$objProd ->loadByKey($objProd ->getIdKey(), intval($page_id))) Tzn::redirect("index.php");
	
	$seo = new stdClass();
	if ($objProd ->seo)
	$seo = json_decode($objProd ->seo);
	if (!$seo ->metaTitle) $seo ->metaTitle =  sprintf("Mudanzas a nivel nacional e internacional | TRANSREFORM SL |Barcelona | Amplia experiencia en este rubro | Equipo altamente capacitado para brindarle el mejor servicio | %s", ($objProd ->title ? strtoupper($objProd ->title) : "..." ));
	
	$_SESSION['vmnu']='guardamuebles';
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
            <li><img src="contenido/img/s_guardamuebles_1.jpg" alt="<?= t('banner_guardamuebles_1');?>"/></li>
            <li><img src="contenido/img/s_guardamuebles_2.jpg" alt="<?= t('banner_guardamuebles_2');?>" /></li>
          </ul>
        </div>
      </div>
      <!-- End of body section HTML codes --> 
      
    </div>
    <?php
			$_SESSION['submenu_vmnu']='guardamuebles';
			include('mnu_guardamuebles.php');
	  ?>
    <div class="cuadro_cont">
      <div class="title_desc">
        <?= t('title_guardamuebles');?>
      </div>
      <div class="img_desc">
      
      <!--<a href="contenido/img/b_almacen.jpg" title="<?= t('title_guardamuebles');?>"  class="html5lightbox" data-group=""><img src="contenido/img/b_almacen.jpg" alt="<?= t('title_guardamuebles');?>" /></a>-->
      
      <?php if ($img = $objProd ->gObjImage()) : ?>
            <a href="upload/<?= $img ->target;?>" title="<?= t('title_guardamuebles');?>"  class="html5lightbox" data-group="">
                <img src="upload/<?= $img ->target;?>" alt="<?= t('title_guardamuebles');?>" />
            </a>
        <?php endif; ?>
      
      </div>
      <div class="text_descr">
        <?= t('des1_guardamuebles');?>
      </div>
      <div class="text_descr">
        <?= t('des2_guardamuebles');?>
      </div>
      <div class="text_descr">
        <?= t('des3_guardamuebles');?>
        <br/>
        <a href="presupuesto.php" class="bt_solic_pres">
        <?= t('btn_solicitar_pres');?>
        </a></div>
    </div>
    <div class="clear1"></div>
    <?php include('inc_footer.php');?>