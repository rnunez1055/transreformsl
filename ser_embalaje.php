<?php		
	$pPageIsPublic = true;
	include '_common.php';
	
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
            <li><img src="contenido/img/s_emabalaje_3.jpg" alt="<?= t('banner_embalajes');?>" /></li>
            <li><img src="contenido/img/s_emabalaje_4.jpg" alt="<?= t('banner_embalajes');?>" /></li>
            <li><img src="contenido/img/s_emabalaje_5.jpg" alt="<?= t('banner_embalajes');?>" /></li>
          </ul>
        </div>
      </div>
      <!-- End of body section HTML codes --> 
    </div>
    <?php
			$_SESSION['submenu_vmnu']='embalaje';
			include('mnu_servicios.php');
	  ?>
    <div class="cuadro_cont">
      <div class="title_desc">
        <?= t('title_embalajes');?>
      </div>
      <div class="img_desc"> <a href="contenido/img/b_embalaje.jpg" title="<?= t('title_embalajes_caja_pequena');?>"  class="html5lightbox" data-group=""><img src="contenido/img/b_embalaje.jpg" alt="<?= t('title_embalajes_caja_pequena');?>"/></a> </div>
      <div class="text_descr"><strong>
        <?= t('title_embalajes_caja_pequena');?>:
        </strong><br/>
        <?= t('des_embalajes_caja_pequena');?>
      </div>
    </div>
    <div class="cuadro_cont">
      <div class="img_desc"> <a href="contenido/img/b_cajagrande.jpg" title="<?= t('title_embalajes_caja_grande');?>"  class="html5lightbox" data-group=""><img src="contenido/img/b_cajagrande.jpg" alt="<?= t('title_embalajes_caja_grande');?>"/></a> </div>
      <div class="text_descr"><strong>
        <?= t('title_embalajes_caja_grande');?>:
        </strong><br/>
        <?= t('des_embalajes_caja_grande');?>
      </div>
    </div>
    <div class="cuadro_cont">
      <div class="img_desc"> <a href="contenido/img/b_cajaparavajilla.jpg" title="<?= t('title_embalajes_caja_vajilla');?>"  class="html5lightbox" data-group=""><img src="contenido/img/b_cajaparavajilla.jpg" alt="<?= t('title_embalajes_caja_vajilla');?>"/></a> </div>
      <div class="text_descr"><strong>
        <?= t('title_embalajes_caja_vajilla');?>:
        </strong><br/>
        <?= t('des_embalajes_caja_vajilla');?>
      </div>
    </div>
    <div class="cuadro_cont">
      <div class="img_desc"> <a href="contenido/img/b_cajaparacopas.jpg" title="<?= t('title_embalajes_caja_copas');?>"  class="html5lightbox" data-group=""><img src="contenido/img/b_cajaparacopas.jpg" alt="<?= t('title_embalajes_caja_copas');?>"/></a> </div>
      <div class="text_descr"><strong>
        <?= t('title_embalajes_caja_copas');?>:
        </strong><br/>
        <?= t('des_embalajes_caja_copas');?>
      </div>
    </div>
    <div class="cuadro_cont">
      <div class="img_desc"> <a href="contenido/img/b_cajapararopero.jpg" title="<?= t('title_embalajes_caja_ropero');?>"  class="html5lightbox" data-group=""><img src="contenido/img/b_cajapararopero.jpg" alt="<?= t('title_embalajes_caja_ropero');?>"/></a> </div>
      <div class="text_descr"><strong>
        <?= t('title_embalajes_caja_ropero');?>:
        </strong><br/>
        <?= t('des_embalajes_caja_ropero');?>
      </div>
    </div>
    <div class="cuadro_cont">
      <div class="img_desc"> <a href="contenido/img/b_liftvan.jpg" title="<?= t('title_embalajes_lift_van');?>"  class="html5lightbox" data-group=""><img src="contenido/img/b_liftvan.jpg" alt="<?= t('title_embalajes_lift_van');?>"/></a> </div>
      <div class="text_descr"><strong>
        <?= t('title_embalajes_lift_van');?>:
        </strong><br/>
        <?= t('des_embalajes_lift_van');?>
      </div>
    </div>
    <div class="cuadro_cont">
      <div class="img_desc"> <a href="contenido/img/b_papelmanila.jpg" title="<?= t('title_embalajes_papel_manila');?>"  class="html5lightbox" data-group=""><img src="contenido/img/b_papelmanila.jpg" alt="<?= t('title_embalajes_papel_manila');?>"/></a> </div>
      <div class="text_descr"><strong>
        <?= t('title_embalajes_papel_manila');?>:
        </strong><br/>
        <?= t('des_embalajes_papel_manila');?>
      </div>
    </div>
    <div class="cuadro_cont">
      <div class="img_desc"> <a href="contenido/img/b_papelburbuja.jpg" title="<?= t('title_embalajes_papel_burbuja');?>"  class="html5lightbox" data-group=""><img src="contenido/img/b_papelburbuja.jpg" alt="<?= t('title_embalajes_papel_burbuja');?>"/></a> </div>
      <div class="text_descr"><strong>
        <?= t('title_embalajes_papel_burbuja');?>:
        </strong><br/>
        <?= t('des_embalajes_papel_burbuja');?>
      </div>
    </div>
    <div class="cuadro_cont">
      <div class="img_desc"> <a href="contenido/img/b_papelkarft.jpg" title="<?= t('title_embalajes_papel_kraft');?>"  class="html5lightbox" data-group=""><img src="contenido/img/b_papelkarft.jpg" alt="<?= t('title_embalajes_papel_kraft');?>"/></a> </div>
      <div class="text_descr"><strong>
        <?= t('title_embalajes_papel_kraft');?>:
        </strong><br/>
        <?= t('des_embalajes_papel_kraft');?>
      </div>
    </div>
    <div class="cuadro_cont">
      <div class="img_desc"> <a href="contenido/img/b_precinto.jpg" title="<?= t('title_embalajes_precinto');?>"  class="html5lightbox" data-group=""><img src="contenido/img/b_precinto.jpg" alt="<?= t('title_embalajes_precinto');?>"/></a> </div>
      <div class="text_descr"><strong>
        <?= t('title_embalajes_precinto');?>:
        </strong><br/>
        <?= t('des_embalajes_precinto');?>
      </div>
    </div>
    <div class="cuadro_cont"> <a href="presupuesto.php" class="bt_solic_pres">
      <?= t('btn_solicitar_pres');?>
      </a> </div>
    <div class="clear1"></div>
    <?php include('inc_footer.php');?>