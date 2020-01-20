<?php 
$pPageIsPublic = false;
include '../_common.php';
$_SESSION["m1"]="news";
$_SESSION["m2"]='n-category-list';
$objName="NewsCategory"; $objUrl="newscategory"; $objTitle="Categor&iacute;as de Noticias";

?>
<?php include("header.php"); ?>
<?php include("sidebar.php"); ?>
<div id="list">
<h2><?= $objTitle ?>s</h2>
<?php Common::hFrmFilterAdmin($objName, $objTitle, $objUrl) ?>
<div id="wrap-list">
<?php
	$objLoaded  = new NewsCategory();
	$objLoaded ->loadItems("#parentId, #orderId ASC", "#status like '". $chkstatus ."%' and #". LBN_ADMIN_CAT_EXCLUDE_1. "='1'");
	$objLoaded ->getUlWithRankList();
?>
</div>
</div>
<?php include("footer.php"); ?>