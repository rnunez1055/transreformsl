<?php initSEO($seo);?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1">
<title><?= $seo ->metaTitle  ?></title>
<meta name="description" content="<?php echo $seo ->metaDescription; ?>" />
<meta name="Keywords" content="<?php echo $seo ->metaKeyword; ?>" />
<!----------------JQUERY VALIDATOR------------------->
<script type="text/javascript" src="contenido/js/jquery.min.js"></script>
<script type="text/javascript" src="contenido/js/jquery.validate.js"></script>
<script type="text/javascript" src="contenido/js/jquery.extend.js"></script>
<link rel="stylesheet" type="text/css" href="contenido/css/contactform.css">

<!-- Jquery====================================================-->
<script src="contenido/js/jquery.min.js"></script>
<script src="contenido/js/myjquery.js"></script>
<!----------------MENU MOBIL------------------->
<!--<link rel="stylesheet" href="contenido/menu/cssmenu/styles.css">
<script src="http://code.jquery.com/jquery-latest.min.js" type="text/javascript"></script>
<script src="contenido/menu/cssmenu/script.js"></script>-->
<!----------------CAROUSEL------------------->
<!--<script src="contenido/carousel/carouselengine/jquery.js"></script>-->
<script src="contenido/carousel/carouselengine/amazingcarousel.js"></script>
<link rel="stylesheet" type="text/css" href="contenido/carousel/carouselengine/initcarousel-1.css">
<script src="contenido/carousel/carouselengine/initcarousel-1.js"></script>
<link rel="stylesheet" type="text/css" href="contenido/carousel/carouselengine/initcarousel-2.css">
<script src="contenido/carousel/carouselengine/initcarousel-2.js"></script>
<!----------------SLIDER------------------->
<script src="contenido/slider/sliderengine/amazingslider.js"></script>
<!----------------CSS WEB------------------->
<link rel="stylesheet" type="text/css" href="contenido/css/normalize.css">
<link rel="stylesheet" type="text/css" href="contenido/css/web.css">
<link rel="stylesheet" type="text/css" href="contenido/css/dispositivos.css">
<!----------------FUENTE------------------->
<link rel="stylesheet" type="text/css" href="contenido/css/fuente/css.css">
<!----------------FAVICON------------------->
<link rel="icon" type="image/x-icon" href="contenido/img/favicon.ico">
<!----------------MENU MOBIL------------------->
<script>
	var originalNavClasses;
	function toggleNav() {
		var elem = document.getElementById('navigation_list');
		var classes = elem.className;
		if (originalNavClasses === undefined) {
			originalNavClasses = classes;
		}
		elem.className = /expanded/.test(classes) ? originalNavClasses : originalNavClasses + ' expanded';
	}
</script>
<!----------------MENU MOBIL------------------->
</head>
<!----------------CONTENIDO------------------->
<body>
<div class="full_header">
  <div class="header_c">
    <div class="logo_p">
        <a href="index.php">
            <img src="contenido/img/logo_p.png" />
        </a>
    </div>
    <div class="w-clearfix c_det_head">
      <div class="contenedor__menu__header">
          <div class="redes_sociales_hd">
              <a href="https://www.facebook.com/Trans-Reform-SL-1736934036581464/" target="_blank" title="TRANS REFORM SL | <?= t('title_ir_a');?> Facebook">
                    <div class="c_fac">
                        <figure>
                            <img src="contenido/img/fb.png" />
                        </figure>
                    </div>
              </a>
              <a href="https://www.linkedin.com/company/10794672?trk=tyah&trkInfo=clickedVertical%3Acompany%2CentityType%3AentityHistoryName%2CclickedEntityId%3Acompany_10794672%2Cidx%3A0" target="_blank" title="TRANS REFORM SL | <?= t('title_ir_a');?> Linkedin">
                    <div class="c_fac">
                        <figure>
                            <img src="contenido/img/in.png" />
                        </figure>
                    </div>
              </a>
              <a href="https://plus.google.com/104387163767342110842" target="_blank" title="TRANS REFORM SL | <?= t('title_ir_a');?> Google Plus">
                    <div class="c_fac">
                       <figure>
                            <img src="contenido/img/googleplus.png" />
                        </figure>
                    </div>
              </a>
              <a href="https://www.youtube.com/channel/UCE7yytahB9fW_4TSq4ctOEw" target="_blank" title="TRANS REFORM SL | <?= t('title_ir_a');?> Youtube">
                    <div class="c_fac">
                        <figure>
                            <img src="contenido/img/youtube.png" />
                        </figure>
                    </div>
              </a>

              <a href="https://www.instagram.com/transreformsl/" target="_blank" title="TRANS REFORM SL | <?= t('title_ir_a');?> Instagram">
                 <div class="c_fac">
                     <figure>
                         <img src="contenido/img/ins.png" alt="">
                    </figure>
                 </div>
              </a>
          </div>
          <div class="trabaja__frecuentes">
              <a href="trabaja_con_nosotros.php?id=85">
                  <div class="text_desc2"><?= t('title_trabaja_nosotros');?></div>
              </a>

              <a href="preguntas_frecuentes.php">
                  <div class="text_desc3"><?= t('title_preguntas_frecuentes');?></div>
              </a>

          </div>
            <div class="contenedor__numeros">
              <div class="text_desc4">(+34)620450030</div>

              <div class="text_desc1">(+34)934913862</div>

              <div class="text_desc0">(+34)625931805</div>
            </div>

          <div class="c_idiomas">
          
          <a href="<?= Tzn::concatUrl($_SERVER["PHP_SELF"].($p =& $_SERVER["QUERY_STRING"] ? "?$p" : ""), "lng=es")?>" class="color_1_idio<?php if($_SESSION['lng']=='es'){echo '_activo';}else{echo '';}?>">ES |</a>
          <a href="<?= Tzn::concatUrl($_SERVER["PHP_SELF"].($p =& $_SERVER["QUERY_STRING"] ? "?$p" : ""), "lng=en")?>" class="color_1_idio<?php if($_SESSION['lng']=='en'){echo '_activo';}else{echo '';}?>"> EN |</a>
          <a href="<?= Tzn::concatUrl($_SERVER["PHP_SELF"].($p =& $_SERVER["QUERY_STRING"] ? "?$p" : ""), "lng=ca")?>" class="color_1_idio<?php if($_SESSION['lng']=='ca'){echo '_activo';}else{echo '';}?>">CAT</a>
          <!--<a href="#" class="color_2_idio">ES |</a>
          <a href="#" class="color_1_idio"> EN |</a>
          <a href="#" class="color_1_idio">CAT</a>-->
          </div>
          
      </div>
    </div>
    
    <!--«Header Responsive-->
    <div class="responsive__header">
        <div class="responsive__sociales">
                  <a href="https://www.facebook.com/Trans-Reform-SL-1736934036581464/" target="_blank" title="TRANS REFORM SL | <?= t('title_ir_a');?> Facebook">
                        <div class="c_fac responsive__fb">
                            <figure>
                                <img src="contenido/img/fb.png" />
                            </figure>
                        </div>
                  </a>
                  <a href="https://www.linkedin.com/company/10794672?trk=tyah&trkInfo=clickedVertical%3Acompany%2CentityType%3AentityHistoryName%2CclickedEntityId%3Acompany_10794672%2Cidx%3A0" target="_blank" title="TRANS REFORM SL | <?= t('title_ir_a');?> Linkedin">
                        <div class="c_fac responsive__in">
                            <figure>
                                <img src="contenido/img/in.png" />
                            </figure>
                        </div>
                  </a>
                  <a href="https://plus.google.com/104387163767342110842" target="_blank" title="TRANS REFORM SL | <?= t('title_ir_a');?> Google Plus">
                        <div class="c_fac responsive__google">
                           <figure>
                                <img src="contenido/img/googleplus.png" />
                            </figure>
                        </div>
                  </a>
                  <a href="https://www.youtube.com/channel/UCE7yytahB9fW_4TSq4ctOEw" target="_blank" title="TRANS REFORM SL | <?= t('title_ir_a');?> Youtube">
                        <div class="c_fac responsive__yt">
                            <figure>
                                <img src="contenido/img/youtube.png" />
                            </figure>
                        </div>
                  </a>

                  <a href="https://www.instagram.com/transreformsl/" target="_blank" title="TRANS REFORM SL | <?= t('title_ir_a');?> Instagram">
                     <div class="c_fac responsive__ins">
                         <figure>
                             <img src="contenido/img/ins.png" alt="">
                        </figure>
                     </div>
                  </a>
            </div>
            
            <div class="responsive__numeros">
              <a href="tel:(+34)625931805">
                  <div class="numeros cellphone">
                   <figure>
                       <img src="contenido/img/mobile.png" alt="TransReformSL-icono-celular">
                   </figure>
                    <span>
                        (+34)625931805
                    </span>
                  </div>
              </a>
              <a href="tel:(+34)934913862">
                  <div class="numeros telephone">
                      <figure>
                          <img src="contenido/img/telef.png" alt="TransReformSL-icono-telefono">
                      </figure>
                      <span>
                          (+34)934913862
                      </span>
                  </div>
              </a>
              <a href="tel:(+34)620450030">
                  <div class="numeros whatsapp">
                      <figure>
                          <img src="contenido/img/what.png" alt="TransReformSL-icono-whatsapp">
                      </figure>
                      <span>
                          (+34)620450030
                      </span>
                  </div>
              </a>
            </div>
            
            <div class="responsive__questions">
              <a href="preguntas_frecuentes.php">
                  <div class="responsive__apartados">
                  <figure>
                      <img src="contenido/img/que.png" alt="TransReformSL-icono-preguntas-frecuentes">
                  </figure>
                  <span>
                    <?= t('title_preguntas_frecuentes');?>
                  </span>
                  </div>
              </a>

              <a href="trabaja_con_nosotros.php?id=85">
                  <div class="responsive__apartados">
                  <figure>
                      <img src="contenido/img/trabajaconnostros.png" alt="TransReformSL-icono-trabaja-nosotros">
                  </figure>
                  <span>
                    <?= t('title_trabaja_nosotros');?>
                  </span>
                  </div>
              </a> 
          </div>
             
              <div class="contenedor__language">
                  <a href="<?= Tzn::concatUrl($_SERVER["PHP_SELF"].($p =& $_SERVER["QUERY_STRING"] ? "?$p" : ""), "lng=es")?>" class="responsive_language language<?php if($_SESSION['lng']=='es'){echo '_activo';}else{echo '';}?>">
                      <span>ES</span>
                  </a>
                  <a href="<?= Tzn::concatUrl($_SERVER["PHP_SELF"].($p =& $_SERVER["QUERY_STRING"] ? "?$p" : ""), "lng=en")?>" class="responsive_language language<?php if($_SESSION['lng']=='en'){echo '_activo';}else{echo '';}?>">
                       <span>EN</span>
                  </a>
                  <a href="<?= Tzn::concatUrl($_SERVER["PHP_SELF"].($p =& $_SERVER["QUERY_STRING"] ? "?$p" : ""), "lng=ca")?>" class="responsive_language language<?php if($_SESSION['lng']=='ca'){echo '_activo';}else{echo '';}?>">
                      <span>CAT</span>
                  </a>
                  
              </div>
        
    </div>
    
    
    
    
    
    <!--«Header Responsive-->
    
    
    
    
    
    
    
    
    <div class="w-clearfix c_det_head_2"><span><?= t('title_horario_atencion');?></span></div>
    <div class="w-clearfix c_menu_c">
          <a href="contacto.php">
              <div class="link_men_last <?php if($_SESSION['vmnu']=='contacto'){echo 'act';}else{echo '';}?>"><?= t('como_contactarnos');?>
              </div>
          </a>
          <a href="presupuesto.php">
              <div class="link_men <?php if($_SESSION['vmnu']=='presupuesto'){echo 'act';}else{echo '';}?>"><?= t('presupuesto_mudanzas');?>
              </div>
          </a>
          <a href="ser_almacen_guardamuebles.php">
              <div class="link_men <?php if($_SESSION['vmnu']=='guardamuebles'){echo 'act';}else{echo '';}?>"><?= t('almacen_guardamuebles');?>
              </div>
          </a>
          <a href="ser_mudanzas_local_nacionales.php">
              <div class="link_men <?php if($_SESSION['vmnu']=='servicios'){echo 'act';}else{echo '';}?>"><?= t('nuestros_servicios_m');?>
              </div>
          </a>
          <a href="quienes_somos_mision.php">
              <div class="link_men <?php if($_SESSION['vmnu']=='empresa'){echo 'act';}else{echo '';}?>"><?= t('quienes_somos');?>
              </div>
          </a>
          <a href="index.php">
              <div class="link_men <?php if($_SESSION['vmnu']=='inicio'){echo 'act';}else{echo '';}?>"><?= t('pagina_principal');?>
              </div>
          </a>
      </div>
    <!--menu mobil-->
    <div class="menu_contenido_mobile">
      <nav id="navigation"> <a class="menu_button" href="#footer_nav" onclick="toggleNav(); return false;">&#9776;  <?= t('title_main_menu');?></a>
        <div class="clear_menu"></div>
        <ul id="navigation_list" role="navigation">
          <li><a href="index.php"><?= t('pagina_principal_mo');?></a></li>
          <li><a href="quienes_somos_mision.php"><?= t('quienes_somos_mo');?></a></li>
          <li><a href="ser_mudanzas_local_nacionales.php"><?= t('nuestros_servicios_m_mo');?></a></li>
          <li><a href="ser_almacen_guardamuebles.php"><?= t('almacen_guardamuebles_mo');?></a></li>
          <li><a href="presupuesto.php"><?= t('presupuesto_mudanzas_mo');?></a></li>
          <li><a href="contacto.php"><?= t('como_contactarnos_mo');?></a></li>
        </ul>
      </nav>
    </div>
    <!--menu mobil--> 
  </div>
</div>
<div class="clear1"></div>
