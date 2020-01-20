<?php		
	$pPageIsPublic = true;
	include '_common.php';
	$_SESSION['vmnu']='presupuesto';
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
            <li><img src="contenido/img/s_presupuesto_mudanza.jpg" alt="<?= t('banner_presupuesto_1');?>" /> </li>
            <li><img src="contenido/img/s_presupuesto_mudanza_1.jpg" alt="<?= t('banner_presupuesto_2');?>" /> </li>
          </ul>
        </div>
      </div>
      <!-- End of body section HTML codes --> 
    </div>
    <?php
			$_SESSION['submenu_vmnu']='presupuesto';
			include('mnu_presupuesto.php');
	  ?>
    <div class="cuadro_cont">
      <div class="title_desc">
        <?= t('title_presupuesto_mudanzas');?>
      </div>
      <div class="text_descr_3">
        <?php
			if(isset($_POST['send'])){
				$emailFrom = "informes@transreformsl.com";
				$emailTo = "informes@transreformsl.com";
				$subject = " | FORMULARIO DE PRESUPUESTO";
				
				/*DATOS BASICOS*/
				$nombre = strip_tags($_POST['nombre']);
				$apellidos = strip_tags($_POST['apellidos']);
				$telefono = strip_tags($_POST['telefono']);
				$Email = strip_tags($_POST['Email']);
				$tipo_servicio = strip_tags($_POST['tipo_servicio']);
				$fecha_deseada_mudanza = strip_tags($_POST['fecha_deseada_mudanza']);
				
				/*DATOS ORIGEN*/				
				$provincia_origen = strip_tags($_POST['provincia_origen']);
				$poblacion_origen = strip_tags($_POST['poblacion_origen']);
				$direccion_origen = strip_tags($_POST['direccion_origen']);
				$cod_postal_origen = strip_tags($_POST['cod_postal_origen']);
				$piso_origen = strip_tags($_POST['piso_origen']);
				$ascensor_origen = strip_tags($_POST['ascensor_origen']);
				
				/*DATOS DESTINO*/	
				$provincia_destino = strip_tags($_POST['provincia_destino']);
				$poblacion_destino = strip_tags($_POST['poblacion_destino']);
				$direccion_destino = strip_tags($_POST['direccion_destino']);
				$cod_postal_destino = strip_tags($_POST['cod_postal_destino']);
				$piso_destino = strip_tags($_POST['piso_destino']);
				$ascensor_destino = strip_tags($_POST['ascensor_destino']);
				
				/*DATOS EXTRAS*/
				$Comonosconocio = strip_tags($_POST['Comonosconocio']);
				$Mensaje = strip_tags($_POST['Mensaje']);
				
				/*----------------------------------------------*/
				
				$body = "Nombres : ".$nombre."\n";
				$body .= "Apellidos : ".$apellidos."\n";
				$body .= "Teléfono : ".$telefono."\n";
				$body .= "Email : ".$Email."\n";
				$body .= "Tipo de Servicio : ".$tipo_servicio."\n";
				$body .= "Fecha deseada de Mudanza : ".$fecha_deseada_mudanza."\n";
				
				/*DATOS ORIGEN*/
				$body .= "DATOS DE ORIGEN \n";				
				$body .= "Provincia : ".$provincia_origen."\n";
				$body .= "Población : ".$poblacion_origen."\n";
				$body .= "Dirección : ".$direccion_origen."\n";
				$body .= "Cod-Postal : ".$cod_postal_origen."\n";
				$body .= "Piso : ".$piso_origen."\n";
				$body .= "Ascensor : ".$ascensor_origen."\n";
				
				/*DATOS DESTINO*/	
				$body .= "DATOS DE DESTINO \n";	
				$body .= "Provincia : ".$provincia_destino."\n";
				$body .= "Población : ".$poblacion_destino."\n";
				$body .= "Dirección : ".$direccion_destino."\n";
				$body .= "Cod-Postal : ".$cod_postal_destino."\n";
				$body .= "Piso : ".$piso_destino."\n";
				$body .= "Ascensor : ".$ascensor_destino."\n";
				
				/*DATOS EXTRAS*/
				$body .= "Como nos conocio : ".$Comonosconocio."\n";
				$body .= "Mensaje : ".$Mensaje."\n";
					
				$headers = "From: ".$emailFrom."\n";
				$headers .= "Reply-To:".$email."\n";	
				
				$success = mail($emailTo, $subject, $body, $headers);
				
				if ($success){
				  echo '<p class="feedback yay"><a href="presupuesto.php" class="menu_arriba">'.t("t_for_OK").'</a></p>';
				}
				else{
				  echo '<p class="feedback oops"><a href="presupuesto.php" class="menu_arriba">'.t("t_for_ERROR").'</a></p>';
				}
			} else {
			?>
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" id="contact" name="contact">
          <fieldset>
            <div class="col_1">
              <label class="lb_1">
                <?= t('t_for_nombres');?>
              </label>
              <input class="caj1" id="nombre" name="nombre" data-name="nombre"  type="text" placeholder="<?= t('t_for_nombres');?>" required="required"/>
              <label class="lb_1">
                <?= t('t_for_apellidos');?>
              </label>
              <input class="caj1" id="apellidos" name="apellidos" data-name="apellidos" type="text" placeholder="<?= t('t_for_apellidos');?>" required="required"/>
              <label class="lb_1">
                <?= t('t_for_telefono');?>
              </label>
              <input class="caj1" id="telefono" name="telefono" data-name="telefono" type="text" placeholder="<?= t('t_for_telefono');?>" name="telefono" data-name="telefono" required="required"/>
              <label class="lb_1"><u>
                <?= t('t_title_for_ciudad_origen');?>
                </u></label>
              <label class="lb_1">
                <?= t('t_for_provincia');?>
              </label>
              <select id="provincia_origen" name="provincia_origen"  class="caj1">
                <option value="">---</option>
                <option value="ALICANTE">ALICANTE</option>
                <option value="ASTURIAS">ASTURIAS</option>
                <option value="BARCELONA">BARCELONA</option>
                <option value="BILBAO">BILBAO</option>
                <option value="CADIZ">CADIZ</option>
                <option value="CASTELLON">CASTELLON</option>
                <option value="CORDOBA">CORDOBA</option>
                <option value="GALICIA - LA CORUÑA">GALICIA - LA CORUÑA</option>
                <option value="GERONA">GERONA</option>
                <option value="GRANADA">GRANADA</option>
                <option value="HUELVA">HUELVA</option>
                <option value="JAEN">JAEN</option>
                <option value="LA RIOJA">LA RIOJA</option>
                <option value="LAS PALMAS DE GRAN CANARIA">LAS PALMAS DE GRAN CANARIA</option>
                <option value="MADRID - TERMINAL NACIONAL">MADRID - TERMINAL NACIONAL</option>
                <option value="MADRID - TERMINAL INTERNACIONAL">MADRID - TERMINAL INTERNACIONAL</option>
                <option value="MALAGA">MALAGA</option>
                <option value="MURCIA">MURCIA</option>
                <option value="NAVARRA">NAVARRA</option>
                <option value="PALMA DE MALLORCA">PALMA DE MALLORCA</option>
                <option value="SAN SEBASTIAN - GUIPUZCOA">SAN SEBASTIAN - GUIPUZCOA</option>
                <option value="SANTANDER - CANTABRIA">SANTANDER - CANTABRIA</option>
                <option value="SEVILLA">SEVILLA</option>
                <option value="TARRAGONA">TARRAGONA</option>
                <option value="TENERIFE">TENERIFE</option>
                <option value="VALENCIA">VALENCIA</option>
                <option value="VALLADOLID">VALLADOLID</option>
                <option value="VITORIA - ALAVA">VITORIA - ALAVA</option>
                <option value="ZARAGOZA">ZARAGOZA</option>
                <option value="BRUSELAS - BÉLGICA">BRUSELAS - BÉLGICA</option>
                <option value="COIMBRA - PORTUGAL">COIMBRA - PORTUGAL</option>
                <option value="LISBOA - PORTUGAL">LISBOA - PORTUGAL</option>
                <option value="LONDRES - REINO UNIDO">LONDRES - REINO UNIDO</option>
                <option value="MOSCÚ - RUSIA">MOSCÚ - RUSIA</option>
                <option value="PARÍS - FRANCIA">PARÍS - FRANCIA</option>
                <option value="OTROS">
                <?= t('t_for_otros');?>
                </option>
              </select>
              <label class="lb_1">
                <?= t('t_for_poblacion');?>
              </label>
              <input class="caj1" id="poblacion_origen" name="poblacion_origen" data-name="poblacion_origen" type="text" placeholder="<?= t('t_for_poblacion');?>"  required="required"/>
              <label class="lb_1">
                <?= t('t_for_origen_direccion');?>
              </label>
              <input class="caj1" id="direccion_origen" name="direccion_origen" data-name="direccion_origen" type="text" placeholder="<?= t('t_for_origen_direccion');?>"  required="required"/>
              <label class="lb_1">
                <?= t('t_for_cod_postal');?>
              </label>
              <input class="caj1" id="cod_postal_origen" name="cod_postal_origen" data-name="cod_postal_origen" type="text" placeholder="<?= t('t_for_cod_postal');?>"  required="required"/>
              <label class="lb_1">
                <?= t('t_for_piso');?>
              </label>
              <input class="caj1" id="piso_origen" name="piso_origen" data-name="piso_origen" type="text" placeholder="<?= t('t_for_piso');?>"  required="required"/>
              <label class="lb_1">
                <?= t('t_for_ascensor');?>
              </label>
              <select id="ascensor_origen" name="ascensor_origen" class="caj0">
                <option value="spiso" selected="selected">--</option>
                <option value="SI"><?= t('t_for_si');?></option>
                <option value="NO"><?= t('t_for_no');?></option>
              </select>
              <label class="lb_1">
                <?= t('t_for_como_conocio');?>
              </label>
              <select id="Comonosconocio" name="Comonosconocio" class="caj01">
                <option value="">---</option>
                <option value="Páginas amarillas">
                <?= t('t_for_paginaamarillas');?>
                </option>
                <option value="Camiones">
                <?= t('t_for_camiones');?>
                </option>
                <option value="Google">
                <?= t('t_for_google');?>
                </option>
                <option value="Otros Internet">
                <?= t('t_for_internet');?>
                </option>
                <option value="Redes Sociales">
                <?= t('t_for_redessociales');?>
                </option>
                <option value="Habitissimo">
                <?= t('t_for_habitissimo');?>
                </option>
                <option value="Recomendación">
                <?= t('t_for_recomendacion');?>
                </option>
                <option value="Ya fui cliente">
                <?= t('t_for_yafuicliente');?>
                </option>
              </select>
            </div>
            <div class="col_2">
              <label class="lb_1">
                <?= t('t_for_email');?>
              </label>
              <input class="caj1" id="Email" name="Email" data-name="Email" type="email" placeholder="<?= t('t_for_email');?>" required="required"/>
              <label class="lb_1">
                <?= t('t_for_servicio');?>
              </label>
              <select id="tipo_servicio" name="tipo_servicio" class="caj1">
                <option value="MUDANZAS LOCALES Y NACIONALES" selected="selected">
                <?= t('t_for_mudanzalocalesnacionales');?>
                </option>
                <option value="MUDANZAS INTERNACIONALES">
                <?= t('t_for_mudanzasinternacionales');?>
                </option>
                <option value="TRASLADO DE OFICINAS">
                <?= t('t_for_trasladodeoficinas');?>
                </option>
                <option value="DESMONTAJE Y MONTAJE DE MUEBLES">
                <?= t('t_for_desmontajemontajemuebles');?>
                </option>
                <option value="ELEVADOR AUTOMATICO DE MUEBLES">
                <?= t('t_for_elevadorautomatico');?>
                </option>
                <option value="EMBALAJES">
                <?= t('t_for_embalajes');?>
                </option>
                <option value="ALMACEN GUARDAMUEBLES">
                <?= t('t_for_almacen');?>
                </option>
              </select>
              <label class="lb_1">
                <?= t('t_for_fechas_deseadas');?>
              </label>
              <input id="fecha_deseada_mudanza" name="fecha_deseada_mudanza" data-name="fecha_deseada_mudanza"  type="date" placeholder="" class="caj1" required/>
              <label class="lb_1"><u>
                <?= t('t_title_for_ciudad_destino');?>
                </u></label>
              <label class="lb_1">
                <?= t('t_for_provincia');?>
              </label>
              <select id="provincia_destino" name="provincia_destino" class="caj1">
                <option value="">---</option>
                <option value="ALICANTE">ALICANTE</option>
                <option value="ASTURIAS">ASTURIAS</option>
                <option value="BARCELONA">BARCELONA</option>
                <option value="BILBAO">BILBAO</option>
                <option value="CADIZ">CADIZ</option>
                <option value="CASTELLON">CASTELLON</option>
                <option value="CORDOBA">CORDOBA</option>
                <option value="GALICIA - LA CORUÑA">GALICIA - LA CORUÑA</option>
                <option value="GERONA">GERONA</option>
                <option value="GRANADA">GRANADA</option>
                <option value="HUELVA">HUELVA</option>
                <option value="JAEN">JAEN</option>
                <option value="LA RIOJA">LA RIOJA</option>
                <option value="LAS PALMAS DE GRAN CANARIA">LAS PALMAS DE GRAN CANARIA</option>
                <option value="MADRID - TERMINAL NACIONAL">MADRID - TERMINAL NACIONAL</option>
                <option value="MADRID - TERMINAL INTERNACIONAL">MADRID - TERMINAL INTERNACIONAL</option>
                <option value="MALAGA">MALAGA</option>
                <option value="MURCIA">MURCIA</option>
                <option value="NAVARRA">NAVARRA</option>
                <option value="PALMA DE MALLORCA">PALMA DE MALLORCA</option>
                <option value="SAN SEBASTIAN - GUIPUZCOA">SAN SEBASTIAN - GUIPUZCOA</option>
                <option value="SANTANDER - CANTABRIA">SANTANDER - CANTABRIA</option>
                <option value="SEVILLA">SEVILLA</option>
                <option value="TARRAGONA">TARRAGONA</option>
                <option value="TENERIFE">TENERIFE</option>
                <option value="VALENCIA">VALENCIA</option>
                <option value="VALLADOLID">VALLADOLID</option>
                <option value="VITORIA - ALAVA">VITORIA - ALAVA</option>
                <option value="ZARAGOZA">ZARAGOZA</option>
                <option value="BRUSELAS - BÉLGICA">BRUSELAS - BÉLGICA</option>
                <option value="COIMBRA - PORTUGAL">COIMBRA - PORTUGAL</option>
                <option value="LISBOA - PORTUGAL">LISBOA - PORTUGAL</option>
                <option value="LONDRES - REINO UNIDO">LONDRES - REINO UNIDO</option>
                <option value="MOSCÚ - RUSIA">MOSCÚ - RUSIA</option>
                <option value="PARÍS - FRANCIA">PARÍS - FRANCIA</option>
                <option value="OTROS">
                <?= t('t_for_otros');?>
                </option>
              </select>
              <label class="lb_1">
                <?= t('t_for_poblacion');?>
              </label>
              <input class="caj1" id="poblacion_destino" name="poblacion_destino" data-name="poblacion_destino" type="text" placeholder="<?= t('t_for_poblacion');?>" required="required"/>
              <label class="lb_1">
                <?= t('t_for_destino_direccion');?>
              </label>
              <input class="caj1" id="direccion_destino" name="direccion_destino" data-name="direccion_destino" type="text" placeholder="<?= t('t_for_destino_direccion');?>"  required="required"/>
              <label class="lb_1">
                <?= t('t_for_cod_postal');?>
              </label>
              <input class="caj1" id="cod_postal_destino" name="cod_postal_destino" data-name="cod_postal_destino"  type="text" placeholder="<?= t('t_for_cod_postal');?>" required="required"/>
              <label class="lb_1">
                <?= t('t_for_piso');?>
              </label>
              <input class="caj1" id="piso_destino" name="piso_destino" data-name="piso_destino"  type="text" placeholder="<?= t('t_for_piso');?>" required="required"/>
              <label class="lb_1">
                <?= t('t_for_ascensor');?>
              </label>
              <select id="ascensor_destino" name="ascensor_destino" class="caj0">
                <option value="spiso" selected="selected">--</option>
                <option value="SI"><?= t('t_for_si');?></option>
                <option value="NO"><?= t('t_for_no');?></option>
              </select>
            </div>
            <label class="lb_1">
              <?= t('t_for_comentarios');?>
            </label>
            <textarea class="caj2" id="Mensaje" name="Mensaje" data-name="Mensaje" cols="" rows="" placeholder="<?= t('t_for_comentarios');?>" required="required"></textarea>
          </fieldset>
          <input class="bt_form" id="send" name="send" type="submit" value="<?= t('t_for_enviar');?>" />
          <input class="bt_form" type="reset" value="<?= t('t_for_limpiar');?>" />
        </form>
        <?php } ?>
      </div>
      <div class="clear1"></div>
      <div class="text_descr_3">
        <?= t('t_for_terminos');?>
      </div>
      <div class="text_descr_3">
        <h5 align="center"><strong><i><span style="color:#007F59">"
          <?= t('t_for_slogan');?>
          "</span></i></strong></h5>
      </div>
    </div>
    <div class="clear1"></div>
    <?php include('inc_footer.php');?>