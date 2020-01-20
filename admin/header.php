<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<!-- Framework CSS -->
<link rel="stylesheet" href="<?php echo LBN_ADMIN_CSS; ?>styles-admin.css" type="text/css" media="all">
<title>CMS</title>
<link rel="SHORTCUT ICON" href="../images/favicon.ico" />
<script type="text/javascript" src="<?php echo LBN_ADMIN_JAVASCRIPT; ?>jquery.js"></script>
<script type="text/javascript" src="<?php echo LBN_ADMIN_JAVASCRIPT; ?>plugins/jquery.ui.js"></script>
<script type="text/javascript" src="<?php echo LBN_ADMIN_JAVASCRIPT; ?>plugins/jquery.colorbox.js"></script>
<script type="text/javascript" src="<?php echo LBN_ADMIN_JAVASCRIPT; ?>plugins/jquery.shadowbox.js"></script>
<script type="text/javascript" src="<?php echo LBN_ADMIN_JAVASCRIPT; ?>plugins/jquery.jgrowl.js"></script>
<script type="text/javascript" src="<?php echo LBN_ADMIN_JAVASCRIPT; ?>plugins/jquery.tabs.js"></script>
<script type="text/javascript" src="<?php echo LBN_ADMIN_JAVASCRIPT; ?>plugins/jquery.validate.js"></script>
<script type="text/javascript" src="<?php echo LBN_ADMIN_JAVASCRIPT; ?>plugins/jquery.maskedinput.js"></script>
<script type="text/javascript" src="<?php echo LBN_ADMIN_JAVASCRIPT; ?>plugins/jquery.watermarkinput.js"></script>
<script type="text/javascript" src="<?php echo LBN_ADMIN_JAVASCRIPT; ?>plugins/jquery.scrollTo.js"></script>
<script type="text/javascript" src="<?php echo LBN_ADMIN_JAVASCRIPT; ?>plugins/jquery.listnav.js"></script>
<script type="text/javascript" src="<?php echo LBN_ADMIN_JAVASCRIPT; ?>plugins/jquery.quicksearch.js"></script>
<script type="text/javascript" src="<?php echo LBN_ADMIN_JAVASCRIPT; ?>plugins/jquery.bgiframe.min.js"></script>
<script type="text/javascript" src="<?php echo LBN_ADMIN_JAVASCRIPT; ?>plugins/jquery.multiSelect.js"></script>
<script type="text/javascript" src="<?php echo LBN_ADMIN_JAVASCRIPT; ?>plugins/jquery.ajaxQueue.js"></script>
<script type="text/javascript" src="<?php echo LBN_ADMIN_JAVASCRIPT; ?>plugins/jquery.autocomplete.js"></script>
<script type="text/javascript" src="<?php echo LBN_ADMIN_JAVASCRIPT; ?>extras/swfobject.js"></script>
<script type="text/javascript" src="<?php echo LBN_ADMIN_JAVASCRIPT; ?>plugins/jquery.uploadify.js"></script>
<script type="text/javascript" src="<?php echo LBN_ADMIN_JAVASCRIPT; ?>custom/admin.js"></script>
<?php include("message.php"); ?>
</head>
<body>
<div class="container">
<div class="span-25" style="position:relative; height:105px;">
  <div style="position:absolute;top:10px;" ><a href="index.php"><img src="../images/admin/logo.png" alt="" /></a></div>
  <div style="position:absolute;top:35px;right:10px;"><b style="color:#333"> <a href="logout.php" style="color:#F90;text-decoration:none;font-size:10px;" >Logout</a> </div>
</div>
<div class="span-25">
  <div id="menu-principal" style="position:relative" >
    <ul>
      <li class="<?php if ($_SESSION['m1']=='home') { echo "current"; } else { echo "" ;}?>"><a href="index.php" title="Home">Home</a></li>
      <li class="<?php if ($_SESSION['m1']=='content') { echo "current"; } else { echo "" ;}?>"><a href="category-list.php" >P&aacute;ginas</a></li>
      <?php /*?><li class="<?php if ($_SESSION['m1']=='news') { echo "current"; } else { echo "" ;}?>"><a href="news-list.php" >Noticias</a></li>
      <li class="<?php if ($_SESSION['m1']=='test') { echo "current"; } else { echo "" ;}?>"><a href="testimonio-list.php" >Promociones</a></li>
      <li class="<?php if ($_SESSION['m1']=='banner') { echo "current"; } else { echo "" ;}?>"><a href="banner-list.php" >Banners</a></li><?php */?>
    </ul>
    <img id="loading" src="../images/ajax-loader.gif" style="position:absolute;top:10px;right:10px;display:none;" /> </div>
  <div class="span-25"><img src="<?php echo LBN_ADMIN_IMAGES; ?>admin/content-top.png" alt=""/></div>
</div>
<div class="span-25" style="background:url(<?php echo LBN_ADMIN_IMAGES; ?>admin/sidebar-900.gif) left -1px repeat-y; min-height:500px;">
