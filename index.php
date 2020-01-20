<?php		
	$pPageIsPublic = true;
	include '_common.php';
	$_SESSION['vmnu']='inicio';
	include('inc_header.php');
?>
<link rel="stylesheet" type="text/css" href="contenido/slider/sliderengine/amazingslider-1.css">
<script src="contenido/slider/sliderengine/initslider-1.js"></script>
<div class="full_slider">
  <div class="slider_c">
    <div id="amazingslider-wrapper-1" style="display:block;position:relative;max-width:990px;margin:0px auto 56px;">
      <div id="amazingslider-1" style="display:block;position:relative;margin:0 auto;">
        <ul class="amazingslider-slides" style="display:none;">         
            <li><img src="contenido/img/slider_1_<?= $_SESSION['lng']?>.jpg" title="<?= t('banner_portada_1');?>"/></li>
          <li><img src="contenido/img/slider_2_<?= $_SESSION['lng']?>.jpg" title="<?= t('banner_portada_2');?>"/></li>
          <li><img src="contenido/img/slider_3_<?= $_SESSION['lng']?>.jpg" title="<?= t('banner_portada_3');?>"/></li>
          <li><img src="contenido/img/slider_4_<?= $_SESSION['lng']?>.jpg" title="<?= t('banner_portada_4');?>"/></li>
          <li><img src="contenido/img/slider_5_<?= $_SESSION['lng']?>.jpg" title="<?= t('banner_portada_5');?>"/></li>
          <li><img src="contenido/img/slider_6_<?= $_SESSION['lng']?>.jpg" title="<?= t('banner_portada_6');?>"/></li>
        </ul>
      </div>
    </div>
  </div>
</div>
<div class="full_c1">
  <div class="centro_c">
    <div class="title_c1">
      <?= t('bienvenida');?>
    </div>
    <div class="text_c2">
      <?= t('descripcion_bienvenida');?>
    </div>
    <div class="text_title1">
      <?= t('nuestros_servicios');?>
    </div>
    <div class="c_carousel1"> 
      
      <!-- Insert to your webpage where you want to display the carousel -->
      <div id="amazingcarousel-container-2">
        <div id="amazingcarousel-2" style="display:none;position:relative;width:100%;max-width:960px;margin:0px auto 0px;">
          <div class="amazingcarousel-list-container">
            <ul class="amazingcarousel-list">
              <li class="amazingcarousel-item">
                <div class="amazingcarousel-item-container">
                  <div class="cuadr_carusel1">
                    <div class="img_carou"> <a href="ser_mudanzas_local_nacionales.php"> <img src="contenido/img/img_1.png" /></a> </div>
                    <div class="cuadr_text_car">
                      <a href="ser_mudanzas_local_nacionales.php"><?= t('carr_mudanzas_locales_nacionales');?></a>
                    </div>
                  </div>
                </div>
              </li>
              <li class="amazingcarousel-item">
                <div class="amazingcarousel-item-container">
                  <div class="cuadr_carusel1">
                    <div class="img_carou"><a href="ser_mudanzas_internacionales.php"><img src="contenido/img/img_3.png" /></a></div>
                    <div class="cuadr_text_car">
                      <a href="ser_mudanzas_internacionales.php"><?= t('carr_mudanzas_locales_internacionales');?></a>
                    </div>
                  </div>
                </div>
              </li>
              <li class="amazingcarousel-item">
                <div class="amazingcarousel-item-container">
                  <div class="cuadr_carusel1">
                    <div class="img_carou"><a href="ser_traslado_oficinas.php"><img src="contenido/img/img_4.png" /></a></div>
                    <div class="cuadr_text_car">
                      <a href="ser_traslado_oficinas.php"><?= t('carr_mudanzas_locales_trasladodeoficinas');?></a>
                    </div>
                  </div>
                </div>
              </li>
              <li class="amazingcarousel-item">
                <div class="amazingcarousel-item-container">
                  <div class="cuadr_carusel1">
                    <div class="img_carou"><a href="ser_desmontaje_montaje_muebles.php"><img src="contenido/img/img_6.png" /></a></div>
                    <div class="cuadr_text_car">
                     <a href="ser_desmontaje_montaje_muebles.php"><?= t('carr_mudanzas_locales_desmontaje_montaje_muebles');?></a>
                    </div>
                  </div>
                </div>
              </li>
              <li class="amazingcarousel-item">
                <div class="amazingcarousel-item-container">
                  <div class="cuadr_carusel1">
                    <div class="img_carou"><a href="ser_elevador_automatico.php"><img src="contenido/img/img_9.png" /></a></div>
                    <div class="cuadr_text_car">
                      <a href="ser_elevador_automatico.php"><?= t('carr_mudanzas_locales_elevador_automatico');?></a>
                    </div>
                  </div>
                </div>
              </li>
              <li class="amazingcarousel-item">
                <div class="amazingcarousel-item-container">
                  <div class="cuadr_carusel1">
                    <div class="img_carou"><a href="ser_embalaje.php"><img src="contenido/img/img_10.png" /></a></div>
                    <div class="cuadr_text_car">
                      <a href="ser_embalaje.php"><?= t('carr_mudanzas_locales_embalaje_muebles');?></a>
                    </div>
                  </div>
                </div>
              </li>
              <li class="amazingcarousel-item">
                <div class="amazingcarousel-item-container">
                  <div class="cuadr_carusel1">
                    <div class="img_carou"> <a href="ser_mudanzas_local_nacionales.php"> <img src="contenido/img/img_1.png" /></a> </div>
                    <div class="cuadr_text_car">
                      <a href="ser_mudanzas_local_nacionales.php"><?= t('carr_mudanzas_locales_nacionales');?></a>
                    </div>
                  </div>
                </div>
              </li>
              <li class="amazingcarousel-item">
                <div class="amazingcarousel-item-container">
                  <div class="cuadr_carusel1">
                    <div class="img_carou"><a href="ser_mudanzas_internacionales.php"><img src="contenido/img/img_3.png" /></a></div>
                    <div class="cuadr_text_car">
                      <a href="ser_mudanzas_internacionales.php"><?= t('carr_mudanzas_locales_internacionales');?></a>
                    </div>
                  </div>
                </div>
              </li>
              <li class="amazingcarousel-item">
                <div class="amazingcarousel-item-container">
                  <div class="cuadr_carusel1">
                    <div class="img_carou"><a href="ser_traslado_oficinas.php"><img src="contenido/img/img_4.png" /></a></div>
                    <div class="cuadr_text_car">
                      <a href="ser_traslado_oficinas.php"><?= t('carr_mudanzas_locales_trasladodeoficinas');?></a>
                    </div>
                  </div>
                </div>
              </li>
              <li class="amazingcarousel-item">
                <div class="amazingcarousel-item-container">
                  <div class="cuadr_carusel1">
                    <div class="img_carou"><a href="ser_desmontaje_montaje_muebles.php"><img src="contenido/img/img_6.png" /></a></div>
                    <div class="cuadr_text_car">
                     <a href="ser_desmontaje_montaje_muebles.php"><?= t('carr_mudanzas_locales_desmontaje_montaje_muebles');?></a>
                    </div>
                  </div>
                </div>
              </li>
              <li class="amazingcarousel-item">
                <div class="amazingcarousel-item-container">
                  <div class="cuadr_carusel1">
                    <div class="img_carou"><a href="ser_elevador_automatico.php"><img src="contenido/img/img_9.png" /></a></div>
                    <div class="cuadr_text_car">
                      <a href="ser_elevador_automatico.php"><?= t('carr_mudanzas_locales_elevador_automatico');?></a>
                    </div>
                  </div>
                </div>
              </li>
              <li class="amazingcarousel-item">
                <div class="amazingcarousel-item-container">
                  <div class="cuadr_carusel1">
                    <div class="img_carou"><a href="ser_embalaje.php"><img src="contenido/img/img_10.png" /></a></div>
                    <div class="cuadr_text_car">
                      <a href="ser_embalaje.php"><?= t('carr_mudanzas_locales_embalaje_muebles');?></a>
                    </div>
                  </div>
                </div>
              </li>
            </ul>
            <div class="amazingcarousel-prev"></div>
            <div class="amazingcarousel-next"></div>
          </div>
          <div class="amazingcarousel-nav"></div>
        </div>
      </div>
    </div>
    <div class="cuad_c_iz">
      <div class="text_title1">
        <?= t('title_peticion_presupuesto');?>
      </div>
      <div class="img_text"><img src="contenido/img/img_7.png" /></div>
      <div class="text_desc">
        <?= t('des_peticion_presupuesto');?>
      </div>
      <a href="presupuesto.php" class="bt_solic_pres">
      <?= t('btn_solicitar_pres');?>
      </a>
      <div class="clear1"></div>
    </div>
    <div class="cuad_c_iz cc_derec">
      <div class="text_title1">
        <?= t('title_testimonios');?>
      </div>
      <div id="amazingcarousel-container-1">
        <div id="amazingcarousel-1" style="display:none;position:relative;width:100%;max-width:506px;margin:0px auto 0px;">
          <div class="amazingcarousel-list-container">
            <ul class="amazingcarousel-list">
              <li class="amazingcarousel-item">
                <div class="amazingcarousel-item-container">
                  <div class="c_testimo_text">
                    <div class="l1"></div>
                    <?= t('des_testimonios1');?>
                    <span class="l2"></span></div>
                  <div class="c_img_test"><img src="contenido/img/testimonio_1.jpg" class="circulo_border" /></div>
                </div>
              </li>
              <li class="amazingcarousel-item">
                <div class="amazingcarousel-item-container">
                  <div class="c_testimo_text">
                    <div class="l1"></div>
                    <?= t('des_testimonios2');?>
                    <span class="l2"></span></div>
                  <div class="c_img_test"><img src="contenido/img/testimonio_2.jpg" class="circulo_border" /></div>
                </div>
              </li>
            </ul>
            <div class="amazingcarousel-prev"></div>
            <div class="amazingcarousel-next"></div>
          </div>
          <div class="amazingcarousel-nav"></div>
        </div>
      </div>
    </div>
    <div class="cuad_central">
      <div class="text_title1 title__flex">
        <figure><img src="contenido/img/que.png" alt=""></figure><p>Preguntas Frecuentes</p>
      </div>
      <div class="text__frecuentes__contenedor">
          <div class="img_text">
              <img src="contenido/img/frecuentes.png" />
          </div>
          <div class="text_frecuentes">
            <?php include('_frecuentes.php'); ?>
          </div>
      </div>
    </div>
    <?php
	include('inc_footer.php');
?>