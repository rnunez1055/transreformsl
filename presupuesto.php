<?php
$pPageIsPublic = true;
include '_common.php';
$_SESSION['vmnu'] = 'presupuesto';
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
            <li><img src="contenido/img/s_presupuesto_mudanza.jpg" alt="<?= t('banner_presupuesto_1'); ?>" /> </li>
            <li><img src="contenido/img/s_presupuesto_mudanza_1.jpg" alt="<?= t('banner_presupuesto_2'); ?>" /> </li>
          </ul>
        </div>
      </div>
      <!-- End of body section HTML codes -->
    </div>
    <?php
    $_SESSION['submenu_vmnu'] = 'presupuesto';
    include('mnu_presupuesto.php');
    ?>
    <div class="cuadro_cont">
      <div class="title_desc">
        <?= t('title_presupuesto_mudanzas'); ?>
      </div>
      <div class="text_descr_3">
        <form action="" method="post" id="form-presupuesto" name="form-presupuesto" class="form">
          <div class="panel__confirmacion vertical" id="respta"></div>
          <div class="form__grid">
            <div>
              <label class="lb_1">
                Nombres
              </label>
              <input class="caj1" id="nombres_p" name="nombres_p" data-name="nombres_p" type="text" placeholder="Nombres" required="required" />
            </div>
            <div>
              <label class="lb_1">
                Apellidos
              </label>
              <input class="caj1" id="apellidos_p" name="apellidos_p" data-name="apellidos_p" type="text" placeholder="Apellidos" required="required" />
            </div>
            <div>
              <label class="lb_1">
                <?= t('t_for_email'); ?>
              </label>
              <input class="caj1" id="email_p" name="email_p" data-name="email_p" type="email" placeholder="<?= t('t_for_email'); ?>" required="required" />
            </div>

            <div>
              <label class="lb_1">
                <?= t('t_for_telefono'); ?>
              </label>
              <input class="caj1" id="telefono_p" name="telefono_p" data-name="telefono_p" type="text" placeholder="<?= t('t_for_telefono'); ?>" required="required" />
            </div>
            <div>
              <label class="lb_1">
                Movil
              </label>
              <input class="caj1" id="movil_p" name="movil_p" data-name="movil_p" type="text" placeholder="Movil" required="required" />
            </div>


            <div>
              <label class="lb_1">
                <?= t('t_for_servicio'); ?>
              </label>
              <select id="tipo_servicio_p" name="tipo_servicio_p" class="caj1">
                <option value="MUDANZAS LOCALES Y NACIONALES" selected="selected">
                  <?= t('t_for_mudanzalocalesnacionales'); ?>
                </option>
                <option value="MUDANZAS INTERNACIONALES">
                  <?= t('t_for_mudanzasinternacionales'); ?>
                </option>
                <option value="TRASLADO DE OFICINAS">
                  <?= t('t_for_trasladodeoficinas'); ?>
                </option>
                <option value="DESMONTAJE Y MONTAJE DE MUEBLES">
                  <?= t('t_for_desmontajemontajemuebles'); ?>
                </option>
                <option value="ELEVADOR AUTOMATICO DE MUEBLES">
                  <?= t('t_for_elevadorautomatico'); ?>
                </option>
                <option value="EMBALAJES">
                  <?= t('t_for_embalajes'); ?>
                </option>
                <option value="ALMACEN GUARDAMUEBLES">
                  <?= t('t_for_almacen'); ?>
                </option>
              </select>
            </div>
            <div>
              <label class="lb_1">
                <?= t('t_for_fechas_deseadas'); ?>
              </label>
              <input id="fecha_deseada_mudanza_p" name="fecha_deseada_mudanza_p" data-name="fecha_deseada_mudanza_p" type="date" placeholder="" class="caj1" required />
            </div>



            <div>
              <label class="lb_1">
                <?= t('t_for_como_conocio'); ?>
              </label>
              <select id="Comonosconocio_p" name="Comonosconocio_p" class="caj01 caja01-ancho">
                <option value="">---</option>
                <option value="Páginas amarillas">
                  <?= t('t_for_paginaamarillas'); ?>
                </option>
                <option value="Camiones">
                  <?= t('t_for_camiones'); ?>
                </option>
                <option value="Google">
                  <?= t('t_for_google'); ?>
                </option>
                <option value="Otros Internet">
                  <?= t('t_for_internet'); ?>
                </option>
                <option value="Redes Sociales">
                  <?= t('t_for_redessociales'); ?>
                </option>
                <option value="Habitissimo">
                  <?= t('t_for_habitissimo'); ?>
                </option>
                <option value="Recomendación">
                  <?= t('t_for_recomendacion'); ?>
                </option>
                <option value="Ya fui cliente">
                  <?= t('t_for_yafuicliente'); ?>
                </option>
              </select>
            </div>
          </div>
          <div class="div-aceptar centrar">
            <input type="checkbox" name="checkbox" id="micheckbox" class="checkbox">
            <p>Acepto y he leído la política de <a style="color:#007F59" href="politica-privacidad.php" target="_blank" class="aceptar-terminos">protección de datos</a></p>
          </div>
          <input class="bt_form" id="send" name="send" type="submit" value="<?= t('t_for_enviar'); ?>" />
          <div class="text_descr_3">
            <h5 align="center"><strong><i><span style="color:#007F59">"
                    <?= t('t_for_slogan'); ?>
                    "</span></i></strong></h5>
          </div>
        </form>
      </div>
      <!-- <div class="clear1"></div>
      <?= t('t_for_terminos'); ?> -->
    </div>

  </div>
  <div class="clear1"></div>
  <?php
  include('inc_footer.php');
  ?>
  <script src="ajax_form.js"></script>
  <script>
    $(document).ready(function() {
      $('#send').attr("disabled", true);
      $('#btn-enviar').removeClass("primary-button");

      $('#micheckbox').on('click', function() {
        if ($(this).is(':checked')) {
          $('#btn-enviar').addClass("primary-button");
          $('#send').attr("disabled", false);
        } else {
          $('#send').attr("disabled", true);
          $('#btn-enviar').removeClass("primary-button");
        }
      })
    })
  </script>