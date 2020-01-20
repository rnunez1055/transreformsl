<?php 
$pPageIsPublic = false;
include '../_common.php';
$_SESSION["m1"]="gallery";
$_SESSION["m2"]='gallery-list';
$objName="File"; $objUrl="news"; $objTitle="Galer&iacute;a";
?>
<?php include("header.php"); ?>
<?php include("sidebar.php"); ?>
<div id="list">
<h2><?= $objTitle ?>s</h2>
<div id="wrap-list">
<?php
				$objPage = new Page();
				$objPage ->id = 0;
				$u = LBN_VAR2_GALLERY;
				include PRJ_INCLUDE_PATH.'admin/page-image-list.php'; 
			?>
</div>
</div>
<?php include("footer.php"); ?>