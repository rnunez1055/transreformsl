<?php 
$pPageIsPublic = false;
include '../_common.php';
$_SESSION["m1"]="banner";
$_SESSION["m2"]='banner-list';
$objName="Page"; $objUrl="news"; $objTitle="Banner";
?>
<?php include("header.php"); ?>
<?php include("sidebar.php"); ?>
<div id="list">
<h2><?= $objTitle ?>s</h2>
<div id="wrap-list">
<?php
				$objPage = new Page();
				$objPage ->id = 0;
				$u = LBN_VAR2_BANNER;
				include PRJ_INCLUDE_PATH.'admin/page-image-list.php'; 
			?>
</div>
</div>
<?php include("footer.php"); ?>