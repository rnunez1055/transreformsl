<div class="c_submenu"> <a href="ser_mudanzas_local_nacionales.php">
  <div class="link_int <?php if($_SESSION['submenu_vmnu']=='mudanzas_locales'){echo 'act_int';}else{echo '';}?>">
    <?= t('mnu_mudanzas_localesnacionales');?>
  </div>
  </a> <a href="ser_mudanzas_internacionales.php">
  <div class="link_int <?php if($_SESSION['submenu_vmnu']=='mudanzas_internacionales'){echo 'act_int';}else{echo '';}?>">
    <?= t('mnu_mudanzas_internacionales');?>
  </div>
  </a> <a href="ser_traslado_oficinas.php">
  <div class="link_int <?php if($_SESSION['submenu_vmnu']=='traslado_de_oficinas'){echo 'act_int';}else{echo '';}?>">
    <?= t('mnu_mudanzas_trasladooficinas');?>
  </div>
  </a> <a href="ser_desmontaje_montaje_muebles.php">
  <div class="link_int <?php if($_SESSION['submenu_vmnu']=='montaje_desmontaje_muebles'){echo 'act_int';}else{echo '';}?>">
    <?= t('mnu_mudanzas_desmontajemontaje');?>
  </div>
  </a> <a href="ser_elevador_automatico.php">
  <div class="link_int <?php if($_SESSION['submenu_vmnu']=='elevador_automatico_muebles'){echo 'act_int';}else{echo '';}?>">
    <?= t('mnu_mudanzas_elevadorautomatico');?>
  </div>
  </a> <a href="ser_embalaje.php">
  <div class="link_int <?php if($_SESSION['submenu_vmnu']=='embalaje'){echo 'act_int';}else{echo '';}?>">
    <?= t('mnu_mudanzas_embalaje');?>
  </div>
  </a> </div>
