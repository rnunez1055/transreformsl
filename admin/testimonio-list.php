<?php 
$pPageIsPublic = false;
include '../_common.php';
$_SESSION["m1"]="test";
$_SESSION["m2"]='test-list';
$objName="Testimonio"; $objUrl="testimonio"; $objTitle="Testimonios";
?>
<?php include("header.php"); ?>
<?php include("sidebar.php"); ?>
<div id="list">
<h2><?= $objTitle ?>s</h2>
<?php Common::hFrmFilterAdmin($objName, $objTitle, $objUrl) ?>
<div id="wrap-list">
<?php
	$objLoaded  = new Testimonio();
	$objLoaded ->loadItems("#orderId ASC", "#status like '". $chkstatus ."%' AND #". LBN_ADMIN_PAGE_EXCLUDE_1."=1");
	echo Common::hSimpleGridV2($objName, $objTitle, $objUrl,$objLoaded, true,
				array(
					'description' => true,
					'navs' => array (
						0 => array (
							'title' 	=> 'Im&aacute;genes',
							'count'     => 'gImagesCount',
							'objName' 	=> 'File',
//							'more'  	=> false
 						)
					) 
				) 
			);
?>
</div>
</div>
<?php include("footer.php"); ?>