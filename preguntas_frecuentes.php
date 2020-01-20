<?php		
	$pPageIsPublic = true;
	include '_common.php';
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
            <li><img src="contenido/img/s_preguntas_frecuentes.jpg" alt="<?= t('banner_preguntas_1');?>" /> </li>
            <li><img src="contenido/img/s_preguntas_frecuentes_1.jpg" alt="<?= t('banner_preguntas_2');?>" /> </li>
          </ul>
        </div>
      </div>
      <!-- End of body section HTML codes --> 
    </div>
    <?php
			$_SESSION['submenu_vmnu']='preguntas_frecuentes';
			include('mnu_preguntas.php');
	  ?>
    <div class="cuadro_cont">
      <div class="title_desc"><?= t('title_preguntasfrecuentes');?></div>
      <div class="text_descr_2">
        <?= t('des_preguntasfrecuentes');?>
      </div>
    </div>
    <div class="clear1"></div>
    <?php include('inc_footer.php');?>