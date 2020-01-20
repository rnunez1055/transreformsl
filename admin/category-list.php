<?php 
$pPageIsPublic = false;
include '../_common.php';
$_SESSION["m1"]="content";
$_SESSION["m2"]='category-list';
$objName="Category"; $objUrl="category"; $objTitle="Categor&iacute;a";

?>
<?php include("header.php"); ?>
<?php include("sidebar.php"); ?>
<div id="list">
<h2><?= $objTitle ?>s</h2>
<?php Common::hFrmFilterAdmin($objName, $objTitle, $objUrl) ?>
<div id="wrap-list">
<?php
	
	$objLoaded = new Category ();
	$objLoaded->loadItems ( "#orderId ASC", "#parentId='0' AND #status like '" . $chkstatus . "%' and ifnull(#". LBN_ADMIN_CAT_EXCLUDE_1.",0)=0" );
	echo Common::hSimpleGrid ( $objName, $objTitle, $objUrl, $objLoaded, true, array ('navs' => array (0 => array ('title' => 'Sub-Categor&iacute;as', 'count' => 'gSubCatsCount', 'objName' => 'SubCategory' ) ) ) );
	
?>
</div>
</div>
<?php include("footer.php"); ?>